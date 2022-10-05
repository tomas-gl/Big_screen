<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;

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

Route::post('login', [AdminController::class, 'login']);

Route::get('isLoggedIn', [AdminController::class, 'isLoggedIn']);

Route::get('getSurveyDatas', [App\Http\Controllers\AdminController::class, 'getSurveyDatas']);

Route::get('getQuestionsSurvey', [SurveyController::class, 'getQuestionsSurvey']);

Route::post('saveQuestionsSurvey', [SurveyController::class, 'saveQuestionsSurvey']);

Route::get('getSurveyResult/{token}', [SurveyController::class, 'getSurveyResult']);
