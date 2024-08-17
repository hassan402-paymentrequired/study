<?php

use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Room\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [RoomController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/message/create', [MessageController::class, 'store'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/room/create', [RoomController::class, 'create']);
    Route::post('/room/create', [RoomController::class, 'store']);
    Route::get('/room/{room}', [RoomController::class, 'show']);
});

require __DIR__.'/auth.php';
