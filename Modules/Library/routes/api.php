<?php

use Illuminate\Support\Facades\Route;
use Modules\Library\Http\Controllers\LibraryController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('libraries', LibraryController::class)->names('library');
});

Route::middleware('auth:sanctum')->group(function () { 
     Route::get('/books', [BookApiController::class, 'index']); Route::post('/books', [BookApiController::class, 'store'])->middleware('role:admin'); Route::put('/books/{book}', [BookApiController::class, 'update'])->middleware('role:admin'); Route::delete('/books/{book}', [BookApiController::class, 'destroy'])->middleware('role:admin'); });