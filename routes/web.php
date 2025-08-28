<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
    // Route::controller(ExpenseController::class)->group(function () {
    //     Route::get('/expenses', 'index');
    // });
    Route::resource('expenses', ExpenseController::class);
    // Route::controller(CategoryController::class)->group(function () {
    //     Route::get('/categories', 'index');
    // });
    Route::resource('categories', CategoryController::class);
});

require __DIR__ . '/auth.php';
