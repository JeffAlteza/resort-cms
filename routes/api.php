<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/inquiry-mail', [ContactController::class, 'sendInquiryMail'])->name('inquiry-mail');

Route::post('/book-mail', [BookingController::class, 'sendBookMail'])->name('book-mail');

// Chatbot API endpoints (protected by API key for n8n integration)
Route::prefix('chatbot')->middleware('api-key')->group(function () {
    // Content endpoints
    Route::get('/faqs', [App\Http\Controllers\Api\ChatbotContentController::class, 'faqs']);
    Route::get('/features', [App\Http\Controllers\Api\ChatbotContentController::class, 'features']);
    Route::get('/gallery', [App\Http\Controllers\Api\ChatbotContentController::class, 'gallery']);
    Route::get('/about-us', [App\Http\Controllers\Api\ChatbotContentController::class, 'aboutUs']);
    Route::get('/contacts', [App\Http\Controllers\Api\ChatbotContentController::class, 'contacts']);
    Route::get('/feedback', [App\Http\Controllers\Api\ChatbotContentController::class, 'feedback']);
    Route::get('/resort-info', [App\Http\Controllers\Api\ChatbotContentController::class, 'resortInfo']);

    // Booking endpoints
    Route::get('/availability', [App\Http\Controllers\Api\ChatbotBookingController::class, 'availability']);
    Route::post('/bookings', [App\Http\Controllers\Api\ChatbotBookingController::class, 'createBooking']);

    // Inquiry endpoints
    Route::post('/inquiries', [App\Http\Controllers\Api\ChatbotInquiryController::class, 'createInquiry']);
});


