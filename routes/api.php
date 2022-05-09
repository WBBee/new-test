<?php

use App\Http\Controllers\Backend\Case1Controller;
use App\Http\Controllers\Backend\Case2Controller;
use App\Http\Controllers\Backend\Case3Controller;
use App\Http\Controllers\Backend\Case4Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/test_case_1', [Case1Controller::class, 'test_case_1']);
Route::get('/test_case_2', [Case2Controller::class, 'test_case_2']);
Route::get('/test_case_3', [Case3Controller::class, 'test_case_3']);
Route::get('/test_case_4', [Case4Controller::class, 'test_case_4']);
Route::get('/test_case_5', [Case4Controller::class, 'test_case_5']);
Route::get('/test_case_6', [Case4Controller::class, 'test_case_6']);
