<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\StudentController;
use App\Models\student; 
use Database\Seeders\StudentcoursesSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');     

Route::prefix('/Auth')->controller(AuthController::class)->group(function()
{
    Route::post('/Registar','Registar');
    Route::post('/Login','login');
});


Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function()
{
    
    Route::post('/Logout','logout');
});

Route::prefix('/student')->middleware('auth:sanctum')->controller( StudentController::class)->group(function()
    {
        Route::post('/store','store');
        Route::get('/index','index');
        Route::post('/Update/{id}','Update');


        
    });