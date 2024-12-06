<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\AppointmentController;

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


        //

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //patients
    Route::get('/patients', action: [PatientsController::class, 'index'])->name('patients.index');
    Route::get('/patients/create', action: [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/patients/store', action: [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/patients/edit/{id}', action: [PatientsController::class, 'edit'])->name('patients.edit');
    Route::patch('/patients/update/{id}', action: [PatientsController::class, 'update'])->name('patients.update');
    Route::post('/patients/delete/{id}', action: [PatientsController::class, 'delete'])->name('patients.delete');


    
    //routes for offices
    Route::get('/offices/index', [OfficeController::class, 'index'])->name('office.index');
    Route::get('/offices/create', [OfficeController::class, 'create'])->name('office.create');
    Route::post('/offices/store', [OfficeController::class, 'store'])->name('office.store');
    Route::get('/offices/edit/{id}', [OfficeController::class, 'edit'])->name('office.edit');
    Route::patch('/offices/update/{id}', [OfficeController::class, 'update'])->name('office.update');
    Route::post('/offices/delete/{id}', [OfficeController::class, 'delete'])->name('office.delete');
    

    //secretary

    Route::get('/secretary/index', [SecretaryController::class, 'index'])->name('secretary.index');
    Route::get('/secretary/create', [SecretaryController::class, 'create'])->name('secretary.create');
    Route::post('/secretary/store', [SecretaryController::class, 'store'])->name('secretary.store');
    Route::get('/secretary/edit/{id}', [SecretaryController::class, 'edit'])->name('secretary.edit');
    Route::patch('/secretary/update/{id}', [SecretaryController::class, 'update'])->name('secretary.update');
    Route::post('/secretary/delete/{id}', [SecretaryController::class, 'delete'])->name('secretary.delete');


          //doctor

    Route::get('/doctor/index', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::patch('/doctor/update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::post('/doctor/delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');


    //appointment
    Route::get('/appointment/index', [AppointmentController::class, 'index'])->name('appointment.index');

});

require __DIR__.'/auth.php';
