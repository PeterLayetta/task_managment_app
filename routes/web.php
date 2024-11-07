<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin',function(){
    return '<h1>Admin Page<h1>';
})->middleware(['auth','verified','role:admin']);

Route::get('manager',function(){
    return '<h1>Manager Page<h1>';
})->middleware(['auth','verified','role:manager|admin']);

Route::get('tugas',function(){
    return view('tugas');
})->middleware(['auth','verified','role_or_permission:lihat-tugas|admin']);

Route::resource('tasks', TaskController::class);
require __DIR__.'/auth.php';
