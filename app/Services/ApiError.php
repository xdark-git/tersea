<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Exception;

class ApiError {

    private Exception $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    public function filter(){
        $message = env('APP_DEBUG') === true ? [
            'APP_DEBUG' => true,
            'message' => $this->exception->getMessage()
        ] : [
            'message' => 'Internal Server Error'
        ];

        return Response($message,Response::HTTP_BAD_REQUEST); 
    }
}