<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Playlist;
use App\Http\Resources\PlaylistResource;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlaylistResource::collection(Playlist::all());
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $playlist = Playlist::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return new PlaylistResource($playlist);
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
            'description' => 'max:300',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $playlist = Playlist::find($id);
        } catch (\Throwable $th) {
            return view('errors.404');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Playlist::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Playlist eliminada correctamente'
        ], 200);
    }
}
