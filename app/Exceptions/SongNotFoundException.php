<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SongNotFoundException extends Exception
{
    public function __construct(string $message = 'La canción solicitada no existe.')
    {
        parent::__construct($message, 404);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function render($request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
            'error' => 'song_not_found',
        ], 404);
    }
}
