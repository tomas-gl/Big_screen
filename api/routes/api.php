<?php

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

Route::post('login',[App\Http\Controllers\AdminController::class, 'login']);

Route::get('getQuestionsSurvey',[App\Http\Controllers\SurveyController::class, 'getQuestionsSurvey']);

Route::post('saveQuestionsSurvey',[App\Http\Controllers\SurveyController::class, 'saveQuestionsSurvey']);

Route::get('getSurveyResult/{token}',[App\Http\Controllers\SurveyController::class, 'getSurveyResult']);