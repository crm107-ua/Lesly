<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:5', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => strtolower($$request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => strtolower($request->username),
            'artist' => $request->artist,
            'pais_id' => $request->pais_id,
        ]);

        $user->save();

        return back()
            ->with('success', 'El usuario ha sido creado correctamente');
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
            $user = User::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return new UserResource($user);
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'description' => ['max:400'],
            'instagram' => ['max:100'],
            'facebook' => ['max:100'],
            'twitter' => ['max:100'],
        ]);

        try {
            $user = User::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ], 200);
    }
}
