<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\JimTop;
use App\Http\Middleware\AdminMiddleware;
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

Route::get('/', JimTop::class)->name('top');

Route::middleware('auth')->middleware('admin')->group(function() {
    Route::get('/admin', Admin::class)->name('admin');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
