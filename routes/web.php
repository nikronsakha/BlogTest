<?php

use App\Http\Controllers\Main\Auth\AuthController;
use App\Http\Controllers\Main\Auth\ForgotController;
use App\Http\Controllers\Main\ContactController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\PostController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=> 'Main'],function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');


});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
    Route::post('/posts/comment/{id}', [PostController::class, 'comment'])->name('comment');
});


Route::group(['middleware' => 'guest'],function (){

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login_process');;


    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register_process');


    Route::get('/forgot', [ForgotController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [ForgotController::class, 'forgot'])->name('forgot_process');;
});

Route::get('/contacts', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contact_form_process', [ContactController::class, 'contactsForm'])->name('contact_form_process');

