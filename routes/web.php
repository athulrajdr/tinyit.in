<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicUrlController;
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

Route::get('/', [PublicUrlController::class, 'index'])->name('home');
Route::post('/', [PublicUrlController::class, 'shortenLink'])->name('home.shorten');
Route::get('/list_links', [PublicUrlController::class, 'links']);
Route::get('/{url_slug}', [PublicUrlController::class, 'urlRedirection']);

