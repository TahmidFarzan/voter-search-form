<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthUser\DashboardController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [PageController::class, 'index'])->name('home');

Auth::routes(['login' => false,'register' => false,'verify' => false]);
Route::prefix('site')->name('site.')->group(function(){

    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});
