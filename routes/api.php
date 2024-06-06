<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('contacts',ContactsController::class);
Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])->name('contacts.restore');
