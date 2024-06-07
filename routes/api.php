<?php

use App\Http\Controllers\{
    ContactsController,
    NotesController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('contacts', ContactsController::class);
Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])->name('contacts.restore');

Route::apiResource('notes', NotesController::class);
Route::put('notes/{note}/restore', [NotesController::class, 'restore'])->name('notes.restore');
