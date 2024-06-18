<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Album;
use App\Http\Resources\AlbumResource;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlbumResource::collection(Album::all());
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
            'description' => 'required|max:450',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagen = "/images/albums/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $request->imagen->move(public_path('/images/albums'), $imagen);

        $id = Album::create([
            'name' => $request->input('name'),
            'artist_id' => Auth::user()->id,
            'estreno' => date("Y"),
            'descripcion' => $request->input('description'),
            'image' => $imagen,
            'slug' => $this->slug($request->input('name')),
        ])->id;

        foreach ($request->input('songs') as $song) {
            Song::where('id', $song)->update(['album_id' => $id]);
        }

        return back()
            ->with('success', 'La álbum ha sido creado correctamente, revisa ahora mismo tu biblioteca!');
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
            $album = Album::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return new AlbumResource($album);
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
            'descripcion' => 'required|max:450',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $album = Album::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $album->image;
        } else {
            if (!strpos($album->image, ':')) {
                unlink(public_path($album->image));
            }
            $imagen = "/images/albums/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->imagen->move(public_path('/images/albums'), $imagen);
        }

        foreach ($album->songs as $song) {
            Song::where('id', $song->id)->update(['album_id' => null]);
        }

        foreach ($request->input('songs') as $song) {
            Song::where('id', $song)->update(['album_id' => $album->id]);
        }

        $album->update(
            [
                'name' => $request->input('name'),
                'descripcion' => $request->input('descripcion'),
                'image' => $imagen
            ]
        );

        $album->save();

        return back()
            ->with('success', 'La álbum ha sido modificada correctamente, revisa ahora mismo tus albums!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Album eliminado correctamente'
        ], 200);
    }
}
