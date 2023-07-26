<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\JimTop;
use App\Http\Livewire\MachineEdit;
use App\Http\Livewire\MachineShow;
use App\Http\Livewire\Record;
use App\Http\Livewire\RecordMachine;
use App\Http\Livewire\TrainingAreaEdit;
use App\Http\Livewire\TrainingAreaShow;
use App\Http\Livewire\UserShow;
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
    Route::get('/admin/user', UserShow::class)->name('userShow');
    Route::get('/admin/machine', MachineShow::class)->name('machineShow');
    Route::get('/admin/machine/edit/{id}', MachineEdit::class)->name('machineEdit');
    Route::get('/admin/training_area', TrainingAreaShow::class)->name('trainingAreaShow');
    Route::get('/admin/training_area/edit/{id}', TrainingAreaEdit::class)->name('trainingAreaEdit');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/record', Record::class)->name('record');
    Route::get('/record/machine/{id}', RecordMachine::class)->name('recordMachine');
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
