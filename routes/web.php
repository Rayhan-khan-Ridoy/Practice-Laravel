<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MangoController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/giveMango',[MangoController::class, 'giveMango'] );
Route::get('/loginPage',[LoginController::class, 'showLoginForm'] );
Route::post('/loginVerify',[LoginController::class, 'loginVerify'] );

Route::get('/register',[RegisterController::class, 'showRegisterForm'] );
Route::post('/register',[RegisterController::class, 'submitRegisterForm'] );
Route::get('/showUserList',[RegisterController::class, 'showUserList'] );

Route::get('/editUser/{id}',[RegisterController::class, 'showEditForm'] );
Route::post('/updateUser/{id}',[RegisterController::class, 'updateEditForm'] );
Route::delete('/deleteUsers/{id}', [RegisterController::class, 'deleteUser']);
