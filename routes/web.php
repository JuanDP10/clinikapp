<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {

    if(Auth::check())
        return redirect('home');

    return view('login');
})->name('login');


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [InicioController::class, 'index'])->name('inicio');

    
    Route::resource('pacientes', PacienteController::class);
    Route::resource('doctores', DoctorController::class);
    Route::resource('citas', CitaController::class);
    Route::resource('consultorios', ConsultorioController::class);

    Route::get('/profileview', function () {return view('profileview');})->name('profileview');    
    Route::get('profile', [AuthController::class, 'showProfileForm'])->name('profile');
    Route::post('profile', [AuthController::class, 'profile'])->name('profile.update');
    Route::delete('profile/photo', [AuthController::class, 'deletePhoto'])->name('profile.deletePhoto');    
    
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('login');
    });

    Route::put('/consultorios/{id}/destroy', [ConsultorioController::class, 'destroy'])->name('consultorios.destroy');
    Route::put('/doctores/{id}/destroy', [DoctorController::class, 'destroy'])->name('doctores.destroy');
    Route::put('/pacientes/{id}/destroy', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/check', [AuthController::class, 'check']);



