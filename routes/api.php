<?php

use App\Http\Controllers\AstuceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrientionController;
use App\Http\Controllers\UserController;
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
Route::post("/api/login",[AuthController::class,"login"]);
Route::post("/api/signup",[UserController::class,"store"]);



// route protégé
Route::middleware("auth:sanctum")->group(function(){
    Route::delete("/api/logout",[AuthController::class,"logout"]);
    Route::name("user.")->resource("user",UserController::class)->except(["create","edit"]);
});

Route::post("/orientation", [OrientionController::class, "getOrientation"]);
Route::get("/astuce", [AstuceController::class, "show"]);

