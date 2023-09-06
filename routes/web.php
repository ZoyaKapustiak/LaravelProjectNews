<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index']);


Route::get('/about-project', function () {
    return view('aboutproject');
});
Route::group(['prefix' => 'guest'], static function() {
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('news/{id}/show', [NewsController::class,'show'])
        ->where('id', '\d+')->name('news.show');

    Route::get('/categoryNews', [CategoryNewsController::class, 'index'])
        ->name('categoryNews');
    Route::get('/categoryNews/{id}/show', [CategoryNewsController::class, 'show'])
        ->where('id', '\d+')->name('categoryNews.show');
});

