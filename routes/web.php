<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('users/index', [UserController::class, 'index'])->name('users/index');
    Route::get('users/{id}/overview', [UserController::class, 'overview'])->name('users/overview');
    Route::get('users/{id}/address', [UserController::class, 'address'])->name('users/address');
    Route::get('users/{id}/packages', [UserController::class, 'packages'])->name('users/packages');
    Route::get('users/{id}/items', [UserController::class, 'items'])->name('users/items');
    Route::get('users/{id}/reports', [UserController::class, 'reports'])->name('users/reports');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
