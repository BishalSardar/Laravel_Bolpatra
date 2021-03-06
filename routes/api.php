<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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

Route::get('/all-bolpatra', [ApiController::class, 'allBolpatra']);

Route::get('/bolpatra/{id}', [ApiController::class, 'singleBolpatra']);

Route::post('/save', [ApiController::class, 'save']);

Route::get('/all-save', [ApiController::class, 'allSave']);

Route::post('/search', [ApiController::class, 'search']);
