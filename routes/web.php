<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Adm\UserController;

Route::get('/', function () {
    return redirect()->route('forums.index');
});

Route::middleware('auth')->group(function (){
    Route::resource('forums', ForumController::class)->except('index', 'show');
    Route::resource('comments', CommentController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::put('/users', [UserController::class, 'updateInfo'])->name('users.updateInfo');
});

Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
});

Route::resource('forums', ForumController::class)->only('index', 'show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
