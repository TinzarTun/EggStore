<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// user
Route::group(['prefix'=> 'user'], function () {
    Route::get('create', [UserController::class,'getCreate'])->name('user.create');
    // Route::post('create', [UserController::class,'postCreate'])->name('user.create.submit');
});
