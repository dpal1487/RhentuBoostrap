<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\PlanController;

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

      // user profile

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/{id}/items', [UserController::class, 'items'])->name('user.items');
        Route::get('/{id}/overview', [UserController::class, 'overview'])->name('user.overview');
        Route::get('/{id}/address', [UserController::class, 'address'])->name('user.address');
        Route::get('/{id}/packages', [UserController::class, 'packages'])->name('user.packages');
        Route::get('/{id}/reports', [UserController::class, 'reports'])->name('user.reports');
    });
    // item page
    Route::group(['prefix' => 'item'], function () {
        Route::get('/' , [ItemController::class , 'index'])->name('item');
        Route::get('/details/{id}' , [ItemController::class , 'details'])->name('item/details');
        Route::get('/customers' , [ItemController::class , 'details'])->name('item/customers');
        Route::post('/status' , [ItemController::class , 'updateStatus'])->name('/item/status');

        Route::get('/reviews/{id}' , [ReviewController::class , 'reviews'])->name('item/reviews');

        // Route::get('category' , [CategoryController::class , 'category'])->name('category');
     });

     // category

     Route::controller(CategoryController::class)->group(function(){
        Route::group(['prefix' =>'category'] , function()
        {
            Route::get('/' , 'index')->name('category.index');
            Route::get('/add' , 'create')->name('category.add');
            Route::post('/store' ,'store')->name('category.store');
            Route::get('{id}/view' ,'show')->name('category.view');
            Route::get('{id}/edit' ,'edit')->name('category.edit');
            Route::post('{id}/update' ,'update')->name('category.update');
            Route::delete('{id}/delete' ,'destroy')->name('category.delete');
        });
     });

     Route::controller(BannerController::class)->group(function(){
        Route::group(['prefix' =>'banner'] , function()
        {
            Route::get('/' , 'index')->name('banner.index');
            Route::get('/add' , 'create')->name('banner.add');
            Route::post('/store' ,'store')->name('banner.store');
            Route::get('{id}/view' ,'show')->name('banner.view');
            Route::get('{id}/edit' ,'edit')->name('banner.edit');
            Route::post('{id}/update' ,'update')->name('banner.update');
            Route::delete('{id}/delete' ,'destroy')->name('banner.delete');
        });
     });

     Route::controller(AttributeController::class)->group(function(){
        Route::group(['prefix' =>'attribute'] , function()
        {
            Route::get('/' , 'index')->name('attribute.index');
            Route::get('/add' , 'create')->name('attribute.add');
            Route::post('/store' ,'store')->name('attribute.store');
            Route::post('/valuestore' ,'valuestore')->name('attribute.valuestore');
            Route::get('{id}' ,'show')->name('attribute.view');
            Route::get('{id}/edit' ,'edit')->name('attribute.edit');
            Route::get('/value/{id}/edit', 'attributevalue')->name('attribute.value.edit');
            Route::post('{id}/update' ,'update')->name('attribute.update');
            Route::delete('{id}/delete' ,'destroy')->name('attribute.delete');
            Route::delete('value/{id}/delete' ,'destroyattribute')->name('attribute.value.delete');
        });
     });

     Route::controller(PlanController::class)->group(function(){
        Route::group(['prefix' =>'plan'] , function()
        {
            Route::get('/' , 'index')->name('plan.index');
            Route::get('/add' , 'create')->name('plan.add');
            Route::post('/store' ,'store')->name('plan.store');
            Route::get('{id}/view' ,'show')->name('plan.view');
            Route::get('{id}/edit' ,'edit')->name('plan.edit');
            Route::post('{id}/update' ,'update')->name('plan.update');
            Route::delete('{id}/delete' ,'destroy')->name('plan.delete');
        });
     });


     Route::controller(ImageController::class)->group(function(){
            Route::post('/upload/image' , 'uploadImage');
            Route::post('/upload/banner' , 'uploadBanner');
     });


    // admin profile page

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
