<?php

use App\Http\Controllers\AstuceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\OrientionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Models\Matiere;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Version\OrVersionConstraintGroup;

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

// route non protégé
Route::post("login",[AuthController::class,"login"]);
Route::post("signup",[UserController::class,"store"]);



// route protégé
Route::middleware("auth:sanctum")->group(function(){
    Route::delete("logout",[AuthController::class,"logout"]);
    Route::name("user.")->resource("user",UserController::class)->except(["create","edit"]);
});

//Orientation
Route::post("orientation", [OrientionController::class, "getOrientation"]);

//Information
Route::get("information", [AstuceController::class, "showAll"]);
Route::get("information/{type}", [AstuceController::class, "filterType"]);

// Question
Route::get("question/{question}",[QuestionController::class,"basic"]);
Route::get("question-avance/{data}",[QuestionController::class,"avance"]);

Route::get("matiere",[MatiereController::class,"index"]);
