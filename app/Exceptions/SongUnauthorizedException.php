<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SongUnauthorizedException extends Exception
{
    public function __construct(string $message = 'Debes autenticarte para realizar esta acción.')
    {
        parent::__construct($message, 401);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function render($request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
            'error' => 'song_unauthorized',
        ], 401);
    }
}
