<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
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
Route::get(
    '/getCardHolderInfo',
    [AccessController::class, 'getCardHolderInfo']
)->name('CardHolderInfo');

Route::get(
    '/authentication',
    [AccessController::class, 'authentication']
)->name('Authentication');