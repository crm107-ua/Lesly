<?php

namespace App\Http\Controllers\Api;

use App\Song;
use App\Http\Resources\SongResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SongResource::collection(Song::all());
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
            'name' => 'required|max:100',
            'letra' => 'required|max:2000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cancion' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'fondo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'max:200',
            'descripcion' => 'max:450'
        ]);

        $imagen = "/songs/images/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $request->imagen->move(public_path('/songs/images'), $imagen);

        $song = "/songs/files/" . $this->name() . '.' . $request->file('cancion')->getClientOriginalExtension();
        $request->cancion->move(public_path('/songs/files'), $song);

        $fondo = null;
        if ($request->file('fondo')) {
            $fondo = "/songs/fondos/" . $this->name() . '.' . $request->file('fondo')->getClientOriginalExtension();
            $request->fondo->move(public_path('/songs/fondos'), $fondo);
        }

        Song::create([
            'url' => $song,
            'name' => $request->input('name'),
            'artist_id' => Auth::user()->id,
            'genero_id' => $request->input('genero'),
            'image' => $imagen,
            'estreno' => date("d/m/Y"),
            'slug' => $this->slug($request->input('name')),
            'letra' => $request->input('letra'),
            'fondo' => $fondo,
            'video' => $request->input('video'),
            'description' => $request->input('description'),
        ]);

        return back()
            ->with('success', 'La canción ha sido añadida correctamente, revisa ahora mismo tus temas!');
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
            $song = Song::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return new SongResource($song);
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
            'name' => 'required|max:100',
            'letra' => 'required|max:2000',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'cancion' => 'file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'fondo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'max:200',
            'descripcion' => 'max:450'
        ]);

        try {
            $song = Song::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $song->image;
        } else {
            if (!strpos($song->image, ':')) {
                unlink(public_path($song->image));
            }
            $imagen = "/songs/images/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->imagen->move(public_path('/songs/images/'), $imagen);
        }

        if (!file_exists($_FILES['cancion']['tmp_name']) || !is_uploaded_file($_FILES['cancion']['tmp_name'])) {
            $cancion = $song->url;
        } else {
            if (!strpos($song->url, ':')) {
                unlink(public_path($song->url));
            }
            $cancion = "/songs/files/" . $this->name() . '.' . $request->file('cancion')->getClientOriginalExtension();
            $request->cancion->move(public_path('/songs/files/'), $cancion);
        }

        if (!file_exists($_FILES['fondo']['tmp_name']) || !is_uploaded_file($_FILES['fondo']['tmp_name'])) {
            $fondo = $song->fondo;
        } else {
            if ($song->fondo) {
                unlink(public_path($song->fondo));
            }
            $fondo = "/songs/fondos/" . $this->name() . '.' . $request->file('fondo')->getClientOriginalExtension();
            $request->fondo->move(public_path('/songs/fondos/'), $fondo);
        }

        if ($request->input('album') == "null") {
            $album = null;
        } else {
            $album = $request->input('album');
        }

        $song->update(
            [
                'url' => $cancion,
                'name' => $request->input('name'),
                'genero_id' => $request->input('genero'),
                'album_id' => $album,
                'image' => $imagen,
                'letra' => $request->input('letra'),
                'fondo' => $fondo,
                'video' => $request->input('video'),
                'description' => $request->input('description'),
            ]
        );

        $song->save();

        return back()
            ->with('success', 'La canción ha sido modificada correctamente, revisa ahora mismo tus canciones!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Canción eliminada correctamente'
        ], 200);
    }
}
