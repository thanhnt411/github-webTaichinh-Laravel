<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbacController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('layouts/admin');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('sliders', SliderController::class);
    Route::resource('introduces', IntroduceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('products', ProductController::class);
    Route::resource('feedbacks', FeedbacController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('statistics', StatisticController::class);
    Route::resource('news', NewsController::class);
    Route::resource('settings', SettingController::class);
});
