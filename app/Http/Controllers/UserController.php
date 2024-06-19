<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Pais;
use App\Estadistica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Listas de seguidores y usuarios seguidos por un user en concreto.
     *
     * @param  int  $username
     * @return \Illuminate\Http\Response
     */
    public function social($username)
    {
        try {
            $user = User::where("username", $username)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return view('pages.user.social.index', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        try {
            $user = User::where("username", $username)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        $songs = null;
        foreach ($user->songs as $song) {
            $songs[] = [
                "title" => "",
                "artist" => $song->artist->name,
                "mp3" => $song->url,
                "poster" => $song->image
            ];
        }

        return view('pages.user.view.index', compact('user', 'songs'));
    }

    /**
     * El usuario loggeado sigue a otro usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {

        User::find(Auth::user()->id)->followings()->attach(User::find($request->input('id')));
       // return redirect()->route('user', ['username' => User::find($request->input('id'))->username]);
       return redirect()->back();
    }

    /**
     * El usuario loggeado deja de siguir a otro usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function unfollow(Request $request)
    {
        User::find(Auth::user()->id)->followings()->detach(User::find($request->input('id')));
        //return redirect()->route('user', ['username' => User::find($request->input('id'))->username]);
        return redirect()->back();
    }

    /**
     * Ajustes generales del usuario loggeado.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        try {
            $geoplugin = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $this->getUserIP()));
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return view('pages.user.settings.index', compact('geoplugin'));
    }

    /**
     * Muestra toda la musica de el artista loggeado.
     *
     * @return \Illuminate\Http\Response
     */
    public function music()
    {
        foreach (Pais::all() as $pais) {
            $datos[strtolower($pais->code)] = Estadistica::join('users', 'estadisticas.user_id', '=', 'users.id')
                ->join('songs', 'estadisticas.song_id', '=', 'songs.id')
                ->where('users.pais_id', '=', $pais->id)
                ->where('songs.artist_id', '=', Auth::user()->id)
                ->select('estadisticas.user_id')->distinct('user_id', 'song_id')->count();
        }
        return view('pages.music.index', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'description' => ['max:400'],
            'instagram' => ['max:100'],
            'facebook' => ['max:100'],
            'twitter' => ['max:100'],
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'name' => $request->input("name"),
            'username' => $request->input("username"),
            'email' => $request->input("email"),
            'description' => $request->input("description"),
            'instagram' => $request->input("instagram"),
            'facebook' => $request->input("facebook"),
            'twitter' => $request->input("twitter")
        ]);

        $user->save();

        return back()
            ->with('success', 'El usuario ha sido modificado correctamente');
    }

    /**
     * Update the specified user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'max:100', 'confirmed', 'required']
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => Hash::make($request->input("password"))
        ]);

        $user->save();

        return back()
            ->with('success', 'El contraseña ha sido modificada correctamente');
    }

    /**
     * Update the specified user wallpaper.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request)
    {
        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'imagen2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'imagen3' => 'image|mimes:jpeg,png,jpg|max:2048',
            'imagen4' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = User::find(Auth::user()->id);

        if (!strpos($user[$request->input("tipo")], 'default') && !strpos($user[$request->input("tipo")], ':')) {
            unlink(public_path($user[$request->input("tipo")]));
        }

        $imagen = "/images/users/" . $this->name() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $request->imagen->move(public_path('/images/users'), $imagen);

        $user->update(
            [
                $request->input("tipo") => $imagen
            ]
        );

        $user->save();

        return back()
            ->with('success', 'La imagen de perfil: ' . $request->input("tipo") . ", ha sido modificada correctamente");
    }

    /**
     * Calendario de eventos del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        $events = null;
        foreach (Auth::user()->following_events as $event) {
            $events[] = [
                'title' => $event->name,
                'start' => $event->fecha->format('D M d Y H:i:s O'),
                'className' => 'b-l b-2x b-info'
            ];
        }
        return view('pages.calendar.index', compact('events'));
    }

    /**
     * Facturas e ingresos del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function factura()
    {
        return view('pages.factura.index');
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

    /* Devuelve la IP del usuario */
    function getUserIP()
    {
        $ipaddress = 'UNKNOWN';
        $keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
        foreach ($keys as $k) {
            if (isset($_SERVER[$k]) && !empty($_SERVER[$k]) && filter_var($_SERVER[$k], FILTER_VALIDATE_IP)) {
                $ipaddress = $_SERVER[$k];
                break;
            }
        }
        return $ipaddress;
    }
}
