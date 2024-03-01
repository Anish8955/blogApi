<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OwnerController;
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

Route::controller(OwnerController::class)->group(function() {
    Route::get('owner-det', 'index');
    Route::post('owner-det', 'ownerpost');
});

Route::controller(NewsletterController::class)->group(function() {
    Route::post('newsletter', 'emailpost');
    Route::get('newsletter','getemail');
    Route::delete('newsletter/{id}','deleteemail');
});