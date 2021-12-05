<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\ShortLinkController::class,'index']);
Route::post('/',[\App\Http\Controllers\ShortLinkController::class,'store'])->name('generate.shorten.link.post');

Route::get('{code}',[\App\Http\Controllers\ShortLinkController::class,'shortenLink'])->name('shorten.link');
