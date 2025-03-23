<?php

use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::resource('tasks', TaskController::class)->except(['show']);
    Route::resource('task-categories', TaskCategoryController::class);

});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
