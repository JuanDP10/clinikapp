<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Consultorio;
use App\Models\Doctor;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        // Obtener los datos de las tablas
        $pacientesCount = Paciente::count();
        $doctoresCount = Doctor::count();
        $citasCount = Cita::count();
        $consultoriosCount = Consultorio::count();

        return view('inicio.index', compact('pacientesCount', 'doctoresCount', 'citasCount', 'consultoriosCount'));
    }
}
