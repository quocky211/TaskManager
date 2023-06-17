<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/login',[UserController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[UserController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-account',[UserController::class,'registerAccount'])->name('register-account');
Route::post('/login-account',[UserController::class,'loginAccount'])->name('login-account');
Route::get('/dashboard',[TaskController::class,'index'])->middleware('isLoggedIn');
Route::get('/logout',[UserController::class,'logout']);
Route::resource('task', TaskController::class);
