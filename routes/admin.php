<?php
namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('users', [UserController::class, 'index'])->name('user');
    Route::get('user/{user}', [UserController::class, 'edit'])->name('user.info');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('tasks', [TodoController::class, 'index'])->name('task');
    Route::get('tasks/{task}', [TodoController::class, 'edit'])->name('task.edit');
    Route::delete('tasks/{task}', [TodoController::class, 'delete'])->name('task.delete');
    Route::put('tasks/{task}', [TodoController::class, 'update'])->name('task.update');
});
