<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

abstract class Controller
{
    public function response(bool $success, int $statusCode, array $errors = [], array $data = [])
    {
        return response()->json(
            [
                'success' => $success,
                'data' => $data,
                'errors' => $errors
            ]
            ,
            $statusCode,
            [
                'Content-Type' => 'application/json',
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
                'Access-Control-Allow-Credentials' => 'true'
            ]
        );
    }

    public function failed(array $errors = [], int $statusCode = 500)
    {
        return self::response(
            success: false,
            statusCode: $statusCode,
            errors: $errors
        );
    }

    public function success(array $data = [])
    {
        return self::response(
            success: true,
            statusCode: HttpResponse::HTTP_OK,
            data: $data
        );
    }
}
