<?php

namespace App\Http\Controllers;

use App\User;
use App\Song;
use App\Event;
use App\Playlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $explorer = Song::take(12)->get();
        $new_songs = Song::take(8)->orderBy('id', 'DESC')->get();
        $top = Song::take(5)->orderBy('reproducciones', 'DESC')->get();
        return view('pages.dashboard.index', compact('explorer', 'new_songs', 'top'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $songs = Song::query()->where('name', 'LIKE', "%{$request->input('content')}%")->orWhere('slug', 'LIKE', "%{$request->input('content')}%")->get();
        $people = User::query()->where('name', 'LIKE', "%{$request->input('content')}%")->orWhere('username', 'LIKE', "%{$request->input('content')}%")->get();
        $playlists = Playlist::query()->where('name', 'LIKE', "%{$request->input('content')}%")->orWhere('slug', 'LIKE', "%{$request->input('content')}%")->get();
        $events = Event::query()->where('name', 'LIKE', "%{$request->input('content')}%")->orWhere('slug', 'LIKE', "%{$request->input('content')}%")->get();
        return view('pages.search.index', compact('songs', 'people', 'playlists', 'events'));
    }
}
