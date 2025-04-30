<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PasswordController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\API\CadastroAfiliadosController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas pelo middleware auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/forgot-password', [PasswordController::class, 'forgotPassword']);
Route::post('/reset-password', [PasswordController::class, 'resetPassword']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
});
Route::middleware('auth:sanctum')->get('/user-by-token', [AuthController::class, 'getUserByToken']);

Route::post('/upload', [UploadController::class, 'upload']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/profile/photo', [ProfileController::class, 'updateProfilePhoto']);
});
Route::post('/afiliados/cadastro', [CadastroAfiliadosController::class, 'store']);
Route::put('/afiliados/{id}', [CadastroAfiliadosController::class, 'update']);
Route::post('/afiliados/{id}/upload-foto', [CadastroAfiliadosController::class, 'uploadProfilePhoto']);
