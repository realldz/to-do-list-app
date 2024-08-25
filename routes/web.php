<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('auth')->name('auth.')->group(function () {
    // Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->back();
    })->name('logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::prefix('task')->name('task.')->group(function () {
        Route::get('create', [TodoController::class, 'create'])->name('create');
        Route::post('store', [TodoController::class, 'store'])->name('store');
    });
});

