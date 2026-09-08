<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SongUploadException extends Exception
{
    public function __construct(string $message = 'No se pudo guardar el archivo de la canción.')
    {
        parent::__construct($message, 422);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function render($request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
            'error' => 'song_upload_failed',
        ], 422);
    }
}
