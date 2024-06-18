<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Song;
use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.forms.add-forms.add-album');
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
    public function show($artist_username, $album_slug)
    {
        try {
            $artist = User::where("username", $artist_username)->firstOrFail();
            $album = Album::where("artist_id", $artist->id)->where("slug", $album_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        $songs = null;
        foreach ($album->songs as $song) {
            $songs[] = [
                "title" => $song->name,
                "artist" => $song->artist->name,
                "mp3" => $song->url,
                "poster" => $song->image
            ];
        }

        return view('pages.album.index', compact('songs', 'album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($album_slug)
    {
        try {
            $album = Album::where("artist_id", Auth::user()->id)->where("slug", $album_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return view('pages.forms.mod-forms.mod-album', compact('album'));
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
            'descripcion' => 'required|max:450',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $album = Album::where("artist_id", Auth::user()->id)->where("slug", $request->input('album_slug'))->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
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
    public function destroy(Request $request)
    {
        try {
            $album = Album::where("artist_id", Auth::user()->id)->where("slug", $request->input('slug'))->firstOrFail();

            if (!strpos($album->image, ':')) {
                unlink(public_path($album->image));
            }

            $album->delete();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return back();
    }

    /**
     * Crea un slug personalizado para un álbum.
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
