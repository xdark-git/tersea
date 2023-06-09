<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvitationController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AdminController::class)->prefix('/admin/')->group(function(){
    Route::post('login', 'login');

    Route::middleware(['auth:sanctum', 'ability:admin'])->group(function (){
        Route::get('get-all-admins', 'getAllAdmins');
        Route::get('get-all-employees', 'getAllEmployees');
        Route::post('add-new-admin', 'addNewAdmin');
        Route::post('add-new-company', 'addNewCompany');
    });
});

Route::controller(CheckController::class)->prefix('/verify/')->group(function(){
    Route::post('token', 'checkSession');
    
    Route::middleware(['auth:sanctum', 'ability:admin, employee'])->group(function (){
        Route::delete('end-session', 'endSession');
    });
});

Route::controller(CompanyController::class)->prefix('/company/')->group(function(){
    Route::middleware(['auth:sanctum', 'ability:admin'])->group(function (){
        Route::post('add-new-company', 'addNew');
        Route::put('update-company', 'update');
        Route::delete('delete-company', 'delete');
    });
    Route::middleware(['auth:sanctum', 'ability:admin, employee'])->group(function (){
        Route::get('get-all-companies', 'getAll');
    });
});

Route::controller(InvitationController::class)->prefix('/invitation/')->group(function(){
    Route::post('confirm', 'confirm');
    Route::middleware(['auth:sanctum', 'ability:admin'])->group(function (){
        Route::post('add-new-employee', 'addNew');
    });
});
