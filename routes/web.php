<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|    DASHBOARD
|    USER
|    ITEM
*/


// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware('auth')->group(function () {

    Route::get('/dashboard' , [HomeController::class, 'index'])->name('dashboard');
    Route::get('/item/status', [UserController::class, 'updateStatus'])->name('/item/status');

      // user profile

    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', [UserController::class, 'index'])->name('users/index');
        Route::get('/{id}/items', [UserController::class, 'items'])->name('users/items');
        Route::get('/{id}/overview', [UserController::class, 'overview'])->name('users/overview');
        Route::get('/{id}/address', [UserController::class, 'address'])->name('users/address');
        Route::get('/{id}/packages', [UserController::class, 'packages'])->name('users/packages');
        Route::get('/{id}/reports', [UserController::class, 'reports'])->name('users/reports');
    });
    // item page
    Route::group(['prefix' => 'item'], function () {
        Route::get('/' , [ItemController::class , 'index'])->name('item');
        Route::get('/details/{id}' , [ItemController::class , 'details'])->name('item/details');
        Route::get('/reviews/{id}' , [ItemController::class , 'reviews'])->name('item/reviews');
        Route::get('/customers' , [ItemController::class , 'details'])->name('item/customers');
        Route::post('/item/status' , [ItemController::class , 'updateStatus'])->name('/item/status');
     });









    // admin profile page

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
