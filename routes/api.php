<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\NotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('contacts', ContactsController::class);
Route::put('contacts/restore/{contact}', [ContactsController::class, 'restore'])
    ->name('contacts.restore');

Route::apiResource('notes', NotesController::class);
Route::put('notes/restore/{note}', [NotesController::class, 'restore'])
    ->name('notes.restore');

Route::apiResource('documents', DocumentsController::class);
Route::put('documents/restore/{document}', [DocumentsController::class, 'restore'])
    ->name('documents.restore');

Route::apiResource('schedules', SchedulesController::class);
Route::put('schedules/restore/{document}', [SchedulesController::class, 'restore'])
    ->name('schedules.restore');
