<?php

namespace App\Http\Controllers;

use Auth;
use App\Song;
use App\User;
use App\Genero;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::all();
        return view('pages.forms.add-forms.add-song', compact('generos'));
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
    public function show($artist_username, $song_slug)
    {
        try {
            $artist = User::where("username", $artist_username)->firstOrFail();
            $song = Song::where("artist_id", $artist->id)->where("slug", $song_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        User::find(Auth::user()->id)->update(['escuchando' =>
        "<a href=/song/" . $song->artist->username . "/" . $song->slug . ">" . $song->name . "</a>" .
            "<br>" . "<a href=/user/" . $song->artist->username . ">" . $song->artist->name . "</a>"]);

        $artist->increment('reproducciones', 1);
        $song->increment('reproducciones', 1);
        $song->reproducir()->attach(Auth::user());

        return view('pages.player.index', compact('song', 'artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($song_slug)
    {
        try {
            $song = Song::where("artist_id", Auth::user()->id)->where("slug", $song_slug)->firstOrFail();
            $generos = Genero::all();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return view('pages.forms.mod-forms.mod-song', compact('song', 'generos'));
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
            'name' => 'required|max:100',
            'letra' => 'required|max:2000',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'cancion' => 'file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'fondo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'max:200',
            'descripcion' => 'max:450'
        ]);

        try {
            $song = Song::where("artist_id", Auth::user()->id)->where("slug", $request->input('song_slug'))->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
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
    public function destroy(Request $request)
    {
        try {
            $song = Song::where("artist_id", Auth::user()->id)->where("slug", $request->input('slug'))->firstOrFail();

            if (!strpos($song->image, ':')) {
                unlink(public_path($song->image));
            }

            if (!strpos($song->url, ':')) {
                unlink(public_path($song->image));
            }

            if ($song->fondo) {
                unlink(public_path($song->fondo));
            }

            $song->delete();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return back();
    }

    /**
     * Crea un slug personalizado para una cancion.
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
