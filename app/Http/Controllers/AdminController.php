<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
            
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

        $token = $user->createToken('token')->plainTextToken;
     
       return Response([
        'data' => AdminResource::make($user),
        'token' => $token
    ],Response::HTTP_ACCEPTED);
        
        
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
