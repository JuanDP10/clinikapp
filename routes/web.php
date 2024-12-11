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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('pacientes', PacienteController::class);
    Route::resource('doctores', DoctorController::class);
    Route::resource('citas', CitaController::class);
    Route::resource('consultorios', ConsultorioController::class);
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [InicioController::class, 'index'])->name('inicio');
    
    Route::get('/profileview', function () {return view('profileview');})->name('profileview');    
    Route::get('profile', [AuthController::class, 'showProfileForm'])->name('profile');
    Route::post('profile', [AuthController::class, 'profile'])->name('profile.update');
    Route::delete('profile/photo', [AuthController::class, 'deletePhoto'])->name('profile.deletePhoto');    
    
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('login');
    });

    Route::resource('consultorios', ConsultorioController::class)->except('destroy', 'edit');
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/check', [AuthController::class, 'check']);



