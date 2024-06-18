<?php

namespace App\Http\Controllers\Api;

use App\Genero;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneroResource;
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
        return GeneroResource::collection(Genero::all());
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
            $genero = Genero::findOrFail($id);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
        return new GeneroResource($genero);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genero::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Genero eliminado correctamente'
        ], 200);
    }
}
