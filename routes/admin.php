<?php
namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('users', [UserController::class, 'index'])->name('user');
    Route::get('user/{user}', [UserController::class, 'edit'])->name('user.info');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('tasks', [TodoController::class, 'index'])->name('task');
});
