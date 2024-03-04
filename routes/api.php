<?php

use App\Http\Controllers\ContactFormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/bubble/getquote', [QuoteController::class, 'getQuoteData'])->name('bubble.getquote');
Route::post('/bubble/getcontactformdata', [ContactFormController::class, 'getContactFormData'])->name('bubble.getcontactformdata');
