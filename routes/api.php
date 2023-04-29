<?php

use App\Http\Controllers\AdminController;
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

Route::prefix('/admin/')->group(function(){
    Route::post('login', [AdminController::class, 'login']);
    Route::get('getAll', [AdminController::class, 'getAll']);
    Route::post('add', [AdminController::class, 'add']);
});