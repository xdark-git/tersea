<?php

namespace App\Http\Controllers;

use App\Services\ApiError;
use App\Http\Resources\AdminResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Admin;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            
        try{
             
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
           $error = new ApiError($e);

           return $error->filter();
        }
        
        
    }

    public function getAllAdmins()
    {
        return Response(
            AdminResource::collection(Admin::all())
        , Response::HTTP_OK);
    }

    public function addNewAdmin(Request $request)
    {
       try{
            $request->validate([
                'email' => 'required|email',
                'name' => 'required',
            ]);

            if(Admin::where('email', $request->email)->first()){
                return Response([
                    'message' => 'The email address is already in use.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
           
            $user = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(App::environment('APP_ADMIN_DEFAULT_PWD')),
                'admin_id' => $request->user()->id  
            ]);

            return Response([
                'data' => AdminResource::make($user),
            ],Response::HTTP_ACCEPTED);

       }catch(Exception $e){
            $error = new ApiError($e);

            return $error->filter();
        }
    }

    public function getAllEmployees(Request $request){
        
        return Response([
            'data' => EmployeeResource::collection(Admin::all())
        ], Response::HTTP_OK);
    }
}
