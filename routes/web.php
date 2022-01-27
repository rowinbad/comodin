<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ruta para la clase Role
Route::get('/roles',[RoleController::class,'index']);
Route::get('/roles/{id}',[RoleController::class,'show']);
Route::post('/roles/create',[RoleController::class,'store']);
Route::put('/roles/update/{id}',[RoleController::class,'update']);
Route::delete('/roles/destroy/{id}',[RoleController::class,'destroy']);