<?php

use App\Http\Controllers\dashboard\password\DataClientsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.accueil');
})->name('home');

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function() {
    Route::get('/', [\App\Http\Controllers\dashboard\Dashboardcontroller::class, 'index'])->name('index');
    Route::get('/password', [\App\Http\Controllers\dashboard\PasswordDashboard::class, 'render'])->name('password');
    Route::get('/password/{categoryId}/clients', [DataClientsController::class, 'showCategoryClients'])->name('clients');
    Route::get('/blog', [\App\Http\Controllers\PostController::class, 'dasboard'])->name('blog');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/password', [\App\Http\Controllers\dashboard\PasswordDashboard::class, 'render'])->name('password.render');
});

Route::prefix('/blog')->name('blog.')->controller(\App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');;
    Route::post('/new', 'store')->name('store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::put('/{post}/edit', 'update')->name('update');;
    Route::get('/{slug}-{post}', 'show')->where([
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
    Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('destroy');
});

//test

require __DIR__.'/auth.php';
