<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify']);
    Route::get('signOut', [AuthController::class, 'signOut'])->name('signOut');
});

Route::middleware('auth')->group(function () {
    Route::get('/redirect/{id}', [AuthController::class, 'redirect'])->name('redirect');
    Route::get('/showVendedor/{id}', [UsersController::class, 'showVendedor'])->name('showVendedor');
    Route::get('/showComprador/{id}', [UsersController::class, 'showComprador'])->name('showComprador');
    Route::get('/buy/{id_article}/{id_user}', [UsersController::class, 'buy'])->name('users.buy');
    Route::put('/buyed/{id_article}/{id_user}', [UsersController::class, 'buyed'])->name('users.buyed');
    Route::post('/cupon/{id_article}/{id_user}', [UsersController::class, 'cupon'])->name('users.cupon');
    Route::get('/create/{id}', [ArticlesController::class, 'create'])->name('articles.create');
    Route::post('/store/{id}', [ArticlesController::class, 'store'])->name('articles.store');
    Route::get('/edit/{id_article}/{id_user}', [ArticlesController::class, 'edit'])->name('articles.edit');
    Route::put('/update/{id}', [ArticlesController::class, 'update'])->name('articles.update');
    Route::get('/show/{id_article}/{id_user}', [ArticlesController::class, 'show'])->name('articles.show');
    Route::delete('/destroy/{id}', [ArticlesController::class, 'destroy'])->name('articles.destroy');
});
