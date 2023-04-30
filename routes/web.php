<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ForumController;

Route::get('/', function () {
    return redirect()->route('forums.index');
});

Route::resource('forums', ForumController::class);

//Route::get('/forums', [ForumController::class, 'index'])->name('forums.index');
//Route::get('/forums/create', [ForumController::class, 'create'])->name('forums.create');
//Route::post('/forums', [ForumController::class, 'store'])->name('forums.store');
//Route::get('/forums/{id}', [ForumController::class, 'show'])->name('forums.show');
