<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
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

        Comment::create([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
            'texto' => $request->input('texto'),
            'fecha' => now()
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
            $comment = Comment::where("user_id", Auth::user()->id)->where("id", $request->input('id'))->firstOrFail();
            $comment->delete();
        } catch (\Throwable $th) {
            return view('errors.403');
        }

        return back();
    }
}
