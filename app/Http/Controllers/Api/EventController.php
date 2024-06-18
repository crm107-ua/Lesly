<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventResource::collection(Event::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'texto' => 'required|max:2000',
            'fecha' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image4' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = "/images/events/" . $this->name() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('/images/events'), $image);

        $image2 = "/images/events/" . $this->name() . '.' . $request->file('image2')->getClientOriginalExtension();
        $request->image2->move(public_path('/images/events'), $image2);

        $image3 = "/images/events/" . $this->name() . '.' . $request->file('image3')->getClientOriginalExtension();
        $request->image3->move(public_path('/images/events'), $image3);

        $image4 = "/images/events/" . $this->name() . '.' . $request->file('image4')->getClientOriginalExtension();
        $request->image4->move(public_path('/images/events'), $image4);

        $event = Event::create([
            'name' => $request->input('name'),
            'artist_id' => Auth::user()->id,
            'description' => $request->input('description'),
            'texto' => $request->input('texto'),
            'slug' => $this->slug($request->input('name')),
            'fecha' => Carbon::parse($request->input('fecha')),
            'image' => $image,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4
        ]);

        foreach ($request->input('songs') as $song) {
            Event::find($event->id)->canciones_en_evento()->attach(Song::find($song));
        }

        return back()
            ->with('success', 'El evento ha sido creado correctamente, revisa ahora mismo tus eventos!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $event = Event::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'texto' => 'required|max:2000',
            'fecha' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image4' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $event = Event::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $image = $event->image;
        } else {
            if (!strpos($event->image, ':')) {
                unlink(public_path($event->image));
            }
            $image = "/images/events/" . $this->name() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/images/events/'), $image);
        }

        if (!file_exists($_FILES['image2']['tmp_name']) || !is_uploaded_file($_FILES['image2']['tmp_name'])) {
            $image2 = $event->image2;
        } else {
            if (!strpos($event->image2, ':') && $event->image2 != null) {
                unlink(public_path($event->image2));
            }
            $image2 = "/images/events/" . $this->name() . '.' . $request->file('image2')->getClientOriginalExtension();
            $request->image2->move(public_path('/images/events/'), $image2);
        }

        if (!file_exists($_FILES['image3']['tmp_name']) || !is_uploaded_file($_FILES['image3']['tmp_name'])) {
            $image3 = $event->image3;
        } else {
            if (!strpos($event->image3, ':') && $event->image3 != null) {
                unlink(public_path($event->image3));
            }
            $image3 = "/images/events/" . $this->name() . '.' . $request->file('image3')->getClientOriginalExtension();
            $request->image3->move(public_path('/images/events/'), $image3);
        }

        if (!file_exists($_FILES['image4']['tmp_name']) || !is_uploaded_file($_FILES['image4']['tmp_name'])) {
            $image4 = $event->image4;
        } else {
            if (!strpos($event->image4, ':') && $event->image4 != null) {
                unlink(public_path($event->image4));
            }
            $image4 = "/images/events/" . $this->name() . '.' . $request->file('image4')->getClientOriginalExtension();
            $request->image4->move(public_path('/images/events/'), $image4);
        }

        $event->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'texto' => $request->input('texto'),
                'fecha' => \Carbon\Carbon::parse($request->input('fecha')),
                'image' => $image,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4
            ]
        );

        foreach ($event->canciones_en_evento() as $song) {
            $event->canciones_en_evento()->detach(Song::find($song));
        }

        foreach ($request->input('songs') as $song) {
            $event->canciones_en_evento()->attach(Song::find($song));
        }

        $event->save();

        return back()
            ->with('success', 'El evento ha sido modificado correctamente, revisa ahora mismo tus próximos eventos!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Evento eliminado correctamente'
        ], 200);
    }
}
