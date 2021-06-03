<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//socialite
Route::group(['as'=>'login.', 'prefix' => 'login'], function () {

    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'redirectToProviderCallback'])->name('providercallback');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Ckeditor
// Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

//Custome Page
Route::get('{slug}', [PageController::class, 'index'])->name('page');
