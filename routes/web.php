<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/home', [ApiController::class, 'index'])->name('index');

Route::get('/search', [ApiController::class, 'search_view'])->name('search_view');
Route::any('/search-result', [ApiController::class, 'search'])->name('search');

Route::get('/imports', [ApiController::class, 'imports'])->name('imports');
Route::get('/exports', [ApiController::class, 'exports'])->name('exports');
