<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ImagesController;

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

Route::controller(ImagesController::class)->group(function () {
	Route::post('/image', 'post');
	Route::delete('/image/{params}', 'delete');
	Route::get('/image', 'get');
	Route::patch('/image/{params}', 'patch');
});