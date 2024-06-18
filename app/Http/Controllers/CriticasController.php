<?php

namespace App\Http\Controllers;

use Auth;
use App\Critica;
use Illuminate\Http\Request;

class CriticasController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|max:400'
        ]);

        Critica::create([
            'song_id' => $request->input('song_id'),
            'user_id' => $request->input('user_id'),
            'texto' => $request->input('texto'),
            'fecha' => now(),
            'estrellas' => $request->input('rating')
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $critica = Critica::where("user_id", Auth::user()->id)->where("id", $request->input('id'))->firstOrFail();
            $critica->delete();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return back();
    }
}
