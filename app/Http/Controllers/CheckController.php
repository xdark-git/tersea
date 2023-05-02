<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Admin;
use App\Models\Employee;
use App\Services\ApiError;
use Exception;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class CheckController extends Controller
{
    /**
     * Verify if the user token is still valid
     * @param Request $request
     * 
     * @return array
     */
    public function checkSession(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        try{
            $token = $request->token;
        
            $personalAccessToken = PersonalAccessToken::findToken($token);

            if ($personalAccessToken) {
                $user = $personalAccessToken->tokenable;

                if($user instanceof Admin)
                {
                    return Response([
                        'data' => AdminResource::make($user),
                        'token' => $token
                    ],Response::HTTP_OK);
                }
                if($user instanceof Employee)
                {
                    return Response([
                        'data' => EmployeeResource::make($user),
                        'token' => $token
                    ],Response::HTTP_OK);
                }
            } else {
                return Response([
                    'message' => 'Invalid token'
                ], Response::HTTP_NOT_FOUND);
            }
        }catch(Exception $e){
            $error = new ApiError($e);

            return $error->filter();
        }
    }
}
