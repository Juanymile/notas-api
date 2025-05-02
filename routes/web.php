<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('api')->prefix('api')->group(function () {
    Route::get('/notas', [NotaController::class, 'index']);
    Route::post('/notas', [NotaController::class, 'store'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
});
