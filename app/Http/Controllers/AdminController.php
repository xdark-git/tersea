<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class AdminController extends Controller
{
    public function login(Request $request)
    {
            
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
         
            $user = Admin::where('email', $request->email)->first();
         
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return Response([
                    'message' => 'The provided credentials are incorrect.']
                    , Response::HTTP_UNAUTHORIZED);
            }
    
            $token = $user->createToken('token',  ['admin'])->plainTextToken;
         
           return Response([
                'data' => AdminResource::make($user),
                'token' => $token
            ],Response::HTTP_ACCEPTED);

        }catch(Exception $e){

            return Response([
                'message' => $e->getMessage()
            ],Response::HTTP_BAD_REQUEST); 
        }
        
        
    }

    public function getAll()
    {
        return AdminResource::collection(Admin::all());
    }

    public function add()
    {
        return;
    }
}
