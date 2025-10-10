<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\IntroduceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('layouts/admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('sliders', SliderController::class);
    Route::resource('introduces', IntroduceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('products', ProductController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('statistics', StatisticController::class);
    Route::resource('news', NewsController::class);
    Route::resource('settings', SettingController::class);
});
require __DIR__ . '/auth.php';
