<?php

namespace App\Exceptions\Api;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ApiException extends HttpResponseException
{
    public function __construct(string $message = "", int $code = Response::HTTP_INTERNAL_SERVER_ERROR, $errors = [])
    {
        // Формируем ответ исключения
        $response = [
            'message' => $message,
        ];
        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        // Ответ
        parent::__construct( response()->json($response)->setStatusCode($code) );
    }
}
