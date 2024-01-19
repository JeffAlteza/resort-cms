<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/feature', [FeatureController::class, 'index'])->name('feature');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::view('/success-inquiry', 'pages.status.success-inquiry')->name('success-inquiry');

Route::get('/book', [BookingController::class, 'index'])->name('book');

