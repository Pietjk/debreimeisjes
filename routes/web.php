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

Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');
Route::get('/ontwerpen', [App\Http\Controllers\PagesController::class, 'designs'])->name('designs');
Route::get('/nieuws', [App\Http\Controllers\PagesController::class, 'news'])->name('news');
Route::get('/over-mij', [App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::resource('post', App\Http\Controllers\PostController::class)->only('edit', 'update');
    Route::resource('news', App\Http\Controllers\NewsController::class)->except('index', 'show');
    Route::post('/product', [App\Http\Controllers\ProductController::class, 'feature'])->name('product.feature');
});
Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
