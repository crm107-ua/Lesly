<?php

namespace App\Http\Controllers;

use Auth;
use App\Song;
use App\User;
use App\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.forms.add-forms.add-playlist');
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
            'description' => 'max:300',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagen = "/images/playlists/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $request->imagen->move(public_path('/images/playlists'), $imagen);

        Playlist::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imagen,
            'slug' => $this->slug($request->input('name')),
            'user_id' => Auth::user()->id
        ]);

        return back()
            ->with('success', 'La playlist ha sido creada correctamente, revisa ahora mismo tus playlists!');
    }

    /**
     * Listas de seguidores de una playlist en concreto.
     *
     * @param  int  $username
     * @return \Illuminate\Http\Response
     */
    public function social($playlist_slug)
    {
        try {
            $playlist = Playlist::where("slug", $playlist_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return view('pages.playlists.social.index', compact('playlist'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username, $playlist_slug)
    {
        try {
            $user = User::where("username", $username)->firstOrFail();
            $playlist = Playlist::where("user_id", $user->id)->where("slug", $playlist_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        $songs = null;
        foreach ($playlist->canciones_en_playlist as $song) {
            $songs[] = [
                "title" => $song->name,
                "artist" => $song->artist->name,
                "mp3" => $song->url,
                "poster" => $song->image
            ];
        }

        return view('pages.playlists.index', compact('playlist', 'songs'));
    }

    /**
     * Usuario loggeado sigue a playlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {

        Playlist::find($request->input('id'))->followers()->attach(User::find(Auth::user()->id));
        return redirect()->route('playlist', [
            'username' => Playlist::find($request->input('id'))->user->username,
            'playlist_slug' => Playlist::find($request->input('id'))->slug
        ]);
    }

    /**
     * El usuario loggeado deja de siguir a la playlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function unfollow(Request $request)
    {
        Playlist::find($request->input('id'))->followers()->detach(User::find(Auth::user()->id));
        return redirect()->route('playlist', [
            'username' => Playlist::find($request->input('id'))->user->username,
            'playlist_slug' => Playlist::find($request->input('id'))->slug
        ]);
    }

    /**
     * El usuario loggeado añade una cancion a una de sus playlists.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToPlaylist($playlist_slug, $song_id)
    {
        try {
            $playlist = Playlist::where("user_id", Auth::user()->id)->where("slug", $playlist_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        if (!$playlist->canciones_en_playlist->contains($song_id)) {
            $playlist->canciones_en_playlist()->attach(Song::find($song_id));
        }

        return redirect()->route('playlist', [
            'username' => $playlist->user->username,
            'playlist_slug' => $playlist->slug
        ]);
    }

    /**
     * El usuario loggeado elimina una cancion a una de sus playlists.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeFromPlaylist(Request $request)
    {
        try {
            $playlist = Playlist::where("user_id", Auth::user()->id)->where("slug", $request->input('playlist_slug'))->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        $playlist->canciones_en_playlist()->detach(Song::find($request->input('song_id')));

        return redirect()->route('playlist', [
            'username' => $playlist->user->username,
            'playlist_slug' => $playlist->slug
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($playlist_slug)
    {
        try {
            $playlist = Playlist::where("user_id", Auth::user()->id)->where("slug", $playlist_slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return view('pages.forms.mod-forms.mod-playlist', compact('playlist'));
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
            'description' => 'max:300',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $playlist = Playlist::where("user_id", Auth::user()->id)->where("slug", $request->input('playlist_slug'))->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $playlist->image;
        } else {
            if (!strpos($playlist->image, ':')) {
                unlink(public_path($playlist->image));
            }
            $imagen = "/images/playlists/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->imagen->move(public_path('/images/playlists'), $imagen);
        }

        $playlist->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $imagen
            ]
        );

        $playlist->save();

        return back()
            ->with('success', 'La playlist ha sido modificada correctamente, revisa ahora mismo tus playlists!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $playlist = Playlist::where("user_id", Auth::user()->id)->where("slug", $request->input('slug'))->firstOrFail();

            if (!strpos($playlist->image, ':')) {
                unlink(public_path($playlist->image));
            }

            $playlist->delete();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return back();
    }

    /**
     * Crea un slug personalizado para una playlist.
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
