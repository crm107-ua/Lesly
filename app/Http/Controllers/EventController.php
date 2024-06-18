<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Song;
use App\Event;
use Carbon\Carbon;
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
        $events = Event::all();
        return view('pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();
        return view('pages.forms.add-forms.add-event', compact('songs'));
    }

    /**
     * Listas de seguidores de un evento en concreto.
     *
     * @param  int  $username
     * @return \Illuminate\Http\Response
     */
    public function social($event_slug)
    {
        try {
            $event = Event::where("slug", $event_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return view('pages.event.social.index', compact('event'));
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
    public function show($artist_username, $event_slug)
    {
        try {
            $user = User::where("username", $artist_username)->firstOrFail();
            $event = Event::where("artist_id", $user->id)->where("slug", $event_slug)->firstOrFail();
            $events = Event::all();
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        return view('pages.event.view.index', compact('event', 'events'));
    }

    /**
     * Iniciar la reproduccion en directo de un evento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request)
    {
        try {
            $event = Event::where("artist_id", Auth::user()->id)->where("slug", $request->input('slug'))->firstOrFail();
            $event->update(['stream' => true]);
            $event->save();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return redirect()->route('event', [
            'artist_username' => $event->user->username,
            'event_slug' => $event->slug
        ]);
    }

    /**
     * Iniciar la reproduccion en directo de un evento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pause(Request $request)
    {
        try {
            $event = Event::where("artist_id", Auth::user()->id)->where("slug", $request->input('slug'))->firstOrFail();
            $event->update(['stream' => false]);
            $event->save();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return redirect()->route('event', [
            'artist_username' => $event->user->username,
            'event_slug' => $event->slug
        ]);
    }

    /**
     * Usuario loggeado sigue a un evento.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {

        Event::find($request->input('id'))->followers()->attach(User::find(Auth::user()->id));
        return redirect()->route('event', [
            'artist_username' => Event::find($request->input('id'))->user->username,
            'event_slug' => Event::find($request->input('id'))->slug
        ]);
    }

    /**
     * El usuario loggeado deja de siguir a un evento.
     *
     * @return \Illuminate\Http\Response
     */
    public function unfollow(Request $request)
    {
        Event::find($request->input('id'))->followers()->detach(User::find(Auth::user()->id));
        return redirect()->route('event', [
            'artist_username' => Event::find($request->input('id'))->user->username,
            'event_slug' => Event::find($request->input('id'))->slug
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($event_slug)
    {
        try {
            $event = Event::where("artist_id", Auth::user()->id)->where("slug", $event_slug)->firstOrFail();
            $songs = Song::all();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return view('pages.forms.mod-forms.mod-event', compact('event', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            $event = Event::where("artist_id", Auth::user()->id)->where("slug", $request->input('event_slug'))->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
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
    public function destroy(Request $request)
    {
        try {

            $event = Event::where("artist_id", Auth::user()->id)->where("slug", $request->input('slug'))->firstOrFail();

            if (!strpos($event->image, ':')) {
                unlink(public_path($event->image));
            }

            if (!strpos($event->image2, ':') && $event->image2 != null) {
                unlink(public_path($event->image2));
            }

            if (!strpos($event->image3, ':') && $event->image3 != null) {
                unlink(public_path($event->image3));
            }
            if (!strpos($event->image4, ':') && $event->image4 != null) {
                unlink(public_path($event->image4));
            }

            $event->delete();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return back();
    }

    /**
     * Crea un slug personalizado para un evento.
     *
     * @param  string  $text
     * @return \Illuminate\Http\Response
     */
    public function slug($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    /**
     * Crea un nombre personalizado para cada imagen.
     *
     * @param  string  $text
     * @return \Illuminate\Http\Response
     */
    public function name()
    {
        return explode(' ', microtime())[0] * 10000000;
    }
}
