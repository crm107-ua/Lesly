<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\SongNotFoundException;
use App\Exceptions\SongUnauthorizedException;
use App\Exceptions\SongUploadException;
use App\Http\Controllers\Controller;
use App\Http\Resources\SongResource;
use App\Song;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Throwable;

class SongController extends Controller
{
    private const RELATIONS = ['artist', 'genero', 'album'];

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $songs = Song::with(self::RELATIONS)->latest()->get();

        return SongResource::collection($songs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return SongResource|JsonResponse
     *
     * @throws SongUnauthorizedException
     * @throws SongUploadException
     */
    public function store(Request $request)
    {
        $this->ensureAuthenticated();

        $request->validate([
            'name' => 'required|max:100',
            'letra' => 'required|max:2000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cancion' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'fondo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'nullable|max:200',
            'descripcion' => 'nullable|max:450',
            'genero' => 'required',
        ]);

        $uploadedPaths = [];

        try {
            $song = DB::transaction(function () use ($request, &$uploadedPaths) {
                $imagen = $this->storeUpload($request->file('imagen'), 'songs/images', $uploadedPaths);
                $audio = $this->storeUpload($request->file('cancion'), 'songs/files', $uploadedPaths);

                $fondo = null;
                if ($request->hasFile('fondo')) {
                    $fondo = $this->storeUpload($request->file('fondo'), 'songs/fondos', $uploadedPaths);
                }

                return Song::create([
                    'url' => $audio,
                    'name' => $request->input('name'),
                    'artist_id' => Auth::id(),
                    'genero_id' => $request->input('genero'),
                    'image' => $imagen,
                    'estreno' => date('d/m/Y'),
                    'slug' => $this->slug($request->input('name')),
                    'letra' => $request->input('letra'),
                    'fondo' => $fondo,
                    'video' => $request->input('video'),
                    'description' => $request->input('description', $request->input('descripcion')),
                ])->load(self::RELATIONS);
            });
        } catch (SongUploadException $exception) {
            $this->cleanupUploadedFiles($uploadedPaths);
            throw $exception;
        } catch (Throwable $exception) {
            $this->cleanupUploadedFiles($uploadedPaths);

            report($exception);

            return response()->json([
                'message' => 'No se pudo crear la canción.',
                'error' => 'song_create_failed',
            ], 500);
        }

        return (new SongResource($song))
            ->additional([
                'message' => 'La canción ha sido añadida correctamente, revisa ahora mismo tus temas!',
            ])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SongResource
     *
     * @throws SongNotFoundException
     */
    public function show($id): SongResource
    {
        try {
            $song = Song::with(self::RELATIONS)->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new SongNotFoundException();
        }

        return new SongResource($song);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return SongResource|JsonResponse
     *
     * @throws SongNotFoundException
     * @throws SongUnauthorizedException
     * @throws SongUploadException
     */
    public function update(Request $request, $id)
    {
        $this->ensureAuthenticated();

        $request->validate([
            'name' => 'required|max:100',
            'letra' => 'required|max:2000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cancion' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'fondo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'nullable|max:200',
            'descripcion' => 'nullable|max:450',
            'genero' => 'required',
        ]);

        try {
            $song = Song::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new SongNotFoundException();
        }

        $uploadedPaths = [];
        $obsoletePaths = [];

        try {
            $song = DB::transaction(function () use ($request, $song, &$uploadedPaths, &$obsoletePaths) {
                $imagen = $song->image;
                if ($request->hasFile('imagen')) {
                    $obsoletePaths[] = $song->image;
                    $imagen = $this->storeUpload($request->file('imagen'), 'songs/images', $uploadedPaths);
                }

                $cancion = $song->url;
                if ($request->hasFile('cancion')) {
                    $obsoletePaths[] = $song->url;
                    $cancion = $this->storeUpload($request->file('cancion'), 'songs/files', $uploadedPaths);
                }

                $fondo = $song->fondo;
                if ($request->hasFile('fondo')) {
                    if ($song->fondo) {
                        $obsoletePaths[] = $song->fondo;
                    }
                    $fondo = $this->storeUpload($request->file('fondo'), 'songs/fondos', $uploadedPaths);
                }

                $album = $request->input('album');
                if ($album === 'null' || $album === '') {
                    $album = null;
                }

                $song->update([
                    'url' => $cancion,
                    'name' => $request->input('name'),
                    'genero_id' => $request->input('genero'),
                    'album_id' => $album,
                    'image' => $imagen,
                    'letra' => $request->input('letra'),
                    'fondo' => $fondo,
                    'video' => $request->input('video'),
                    'description' => $request->input('description', $request->input('descripcion')),
                ]);

                return $song->fresh(self::RELATIONS);
            });

            $this->cleanupUploadedFiles($obsoletePaths);
        } catch (SongUploadException $exception) {
            $this->cleanupUploadedFiles($uploadedPaths);
            throw $exception;
        } catch (Throwable $exception) {
            $this->cleanupUploadedFiles($uploadedPaths);
            report($exception);

            return response()->json([
                'message' => 'No se pudo modificar la canción.',
                'error' => 'song_update_failed',
            ], 500);
        }

        return (new SongResource($song))->additional([
            'message' => 'La canción ha sido modificada correctamente, revisa ahora mismo tus canciones!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     *
     * @throws SongNotFoundException
     */
    public function destroy($id): JsonResponse
    {
        try {
            $song = Song::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new SongNotFoundException();
        }

        try {
            DB::transaction(function () use ($song) {
                $this->deleteLocalMedia($song->image);
                $this->deleteLocalMedia($song->url);

                if ($song->fondo) {
                    $this->deleteLocalMedia($song->fondo);
                }

                $song->delete();
            });
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => 'No se pudo eliminar la canción.',
                'error' => 'song_delete_failed',
            ], 500);
        }

        return response()->json([
            'message' => 'Canción eliminada correctamente',
        ], 200);
    }

    /**
     * @throws SongUnauthorizedException
     */
    private function ensureAuthenticated(): void
    {
        if (!Auth::check()) {
            throw new SongUnauthorizedException();
        }
    }

    /**
     * Guarda un fichero en public/ y registra la ruta relativa.
     *
     * @param  UploadedFile  $file
     * @param  string  $directory
     * @param  array<int, string>  $uploadedPaths
     * @return string
     *
     * @throws SongUploadException
     */
    private function storeUpload(UploadedFile $file, string $directory, array &$uploadedPaths): string
    {
        $destination = public_path($directory);

        if (!File::isDirectory($destination) && !File::makeDirectory($destination, 0755, true)) {
            throw new SongUploadException("No se pudo preparar el directorio {$directory}.");
        }

        $filename = $this->name() . '.' . $file->getClientOriginalExtension();
        $relativePath = '/' . trim($directory, '/') . '/' . $filename;

        try {
            $file->move($destination, $filename);
        } catch (Throwable $exception) {
            report($exception);
            throw new SongUploadException("Error al subir el archivo a {$directory}.");
        }

        if (!File::exists($destination . DIRECTORY_SEPARATOR . $filename)) {
            throw new SongUploadException("El archivo no se guardó correctamente en {$directory}.");
        }

        $uploadedPaths[] = $relativePath;

        return $relativePath;
    }

    /**
     * Elimina medios locales (ignora URLs remotas http/https).
     *
     * @param  string|null  $path
     * @return void
     */
    private function deleteLocalMedia(?string $path): void
    {
        if ($path === null || $path === '' || strpos($path, ':') !== false) {
            return;
        }

        $absolute = public_path($path);

        if (File::exists($absolute)) {
            File::delete($absolute);
        }
    }

    /**
     * @param  array<int, string>  $paths
     * @return void
     */
    private function cleanupUploadedFiles(array $paths): void
    {
        foreach ($paths as $path) {
            $this->deleteLocalMedia($path);
        }
    }

    /**
     * Crea un slug personalizado para una canción.
     *
     * @param  string  $text
     * @return string
     */
    public function slug($text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Crea un nombre personalizado para cada fichero.
     *
     * @return int
     */
    public function name(): int
    {
        return (int) (explode(' ', microtime())[0] * 10000000);
    }
}
