<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('', [ApiProductController::class, 'getProduct'])->name('apiproduct.getProduct');
    });
});
Route::get('admin', [AdminController::class, 'loginAdmin'])->name('admin.loginAdmin');
Route::post('admin', [AdminController::class, 'postLoginAdmin'])->name('admin.postLoginAdmin');
// Route::middleware('checkLogin')->group(function () {
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('logout', [AdminController::class, 'Logout'])->name('logout');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('delete/{id}', [CategoryController::class, 'del'])->name('categories.delete');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('create', [MenuController::class, 'create'])->name('menu.create');
        Route::get('', [MenuController::class, 'index'])->name('menu.index');
        Route::post('store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::get('delete/{id}', [MenuController::class, 'del'])->name('menu.delete');
        Route::put('update/{id}', [MenuController::class, 'update'])->name('menu.update');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::get('', [ProductController::class, 'index'])->name('product.index');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('delete/{id}', [ProductController::class, 'del'])->name('product.delete');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update');
    });
    Route::group(['prefix' => 'slider'], function () {
        Route::get('create', [SliderController::class, 'create'])->name('slider.create');
        Route::get('', [SliderController::class, 'index'])->name('slider.index');
        Route::post('store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::get('delete/{id}', [SliderController::class, 'del'])->name('slider.delete');
        Route::put('update/{id}', [SliderController::class, 'update'])->name('slider.update');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::get('', [UserController::class, 'index'])->name('user.index');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::get('delete/{id}', [UserController::class, 'del'])->name('user.delete');
        Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
    });
    Route::group(['prefix' => 'role'], function () {
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::get('', [RoleController::class, 'index'])->name('role.index');
        Route::post('store', [RoleController::class, 'store'])->name('role.store');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::get('delete/{id}', [RoleController::class, 'del'])->name('role.delete');
        Route::put('update/{id}', [RoleController::class, 'update'])->name('role.update');
    });
    Route::group(['prefix' => 'permission'], function () {
        Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
    });
});
// });
