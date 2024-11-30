<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientsController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profiles/index', [ProfileController::class, 'index'])->name('profile.index');
    
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profile.create');

    Route::post('/profiles/store', [ProfileController::class, 'store'])->name('profile.store');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::get('/patients', action: [PatientsController::class, 'index'])->name('patients.index');
    
    
});

require __DIR__.'/auth.php';
