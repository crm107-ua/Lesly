<?php

namespace App\Http\Controllers;

use App\Song;
use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::all();
        $songs = Song::all();
        $slug = null;

        foreach ($songs as $song) {
            $canciones[] = [
                "title" => $song->name,
                "artist" => $song->artist->name,
                "mp3" => $song->url,
                "poster" => $song->image
            ];
        }

        return view('pages.generos.index', compact('canciones', 'generos', 'songs', 'slug'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $generos = Genero::all();
            $genero = Genero::where('slug', $slug)->firstOrFail();
        } catch (\Throwable $th) {
            return view('errors.404');
        }

        $canciones = null;
        foreach ($genero->songs as $song) {
            $canciones[] = [
                "title" => $song->name,
                "artist" => $song->artist->name,
                "mp3" => $song->url,
                "poster" => $song->image
            ];
        }

        return view('pages.generos.index', compact('canciones', 'generos', 'genero', 'slug'));
    }
}
