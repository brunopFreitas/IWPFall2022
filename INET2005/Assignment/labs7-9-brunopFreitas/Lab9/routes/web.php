<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PersonController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/languages', [App\Http\Controllers\LanguageController::class, 'index'])->name('languages.index');
//Route::get('/languages/create', [App\Http\Controllers\LanguageController::class, 'create'])->name('languages.create');

Route::resource('/languages', LanguageController::class);
Route::resource('/people', PersonController::class);

Route::get('/activeusers',[App\Http\Controllers\ActiveUsersController::class, 'welcome'])
    ->name('activeusers.welcome');
//    ->middleware('check.user.active');
