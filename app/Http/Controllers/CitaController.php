<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Consultorio;
use App\Models\Cita;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estado = $request->input('estado', 'todos');
    
        // Filtrar los doctores basados en el estado.
        if ($estado == 'todos') {
            $data = Cita::all();
        } else {
            $data = Cita::where('estado', $estado)->get();
        }
    
        return view('citas.index', compact('data', 'estado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $estados = ['Programada', 'Cancelada', 'Completada'];

        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $pacientes = Paciente::all();
    
        // Pasar la variable consultorios a la vista
        return view('citas.create', compact('consultorios', 'doctores', 'pacientes', 'estados'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'doctor_id' => 'required',
            'paciente_id' => 'required',
            'consultorio_id' => 'required',
            'diagnostico' => 'nullable',
            'tratamiento' => 'nullable',
            'estado' => 'required',
        ]);
        
        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $pacientes = Paciente::all();
  
        Cita::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'doctor_id' => $request->doctor_id,
            'paciente_id' => $request->paciente_id,
            'consultorio_id' => $request->consultorio_id,
            'diagnostico' => $request->diagnostico,
            'tratamiento' => $request->tratamiento,
            'estado' => $request->estado,
        ]);
    
        return redirect()->route('citas.index')->with('success', 'Cita agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = ['Programada', 'Cancelada', 'Completada'];
        $data = Cita::find($id);
        $consultorios = Consultorio::all();
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        return view('citas.edit', compact('data', 'consultorios', 'pacientes', 'doctores', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'doctor_id' => 'required',
            'paciente_id' => 'required',
            'consultorio_id' => 'required',
            'diagnostico' => 'nullable',
            'tratamiento' => 'nullable',
            'estado' => 'required',
        ]);
    
        // Obtener el doctor de la base de datos
        $cita = Cita::find($id);
    
        // Actualizar los datos del doctor
        $cita->update([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'doctor_id' => $request->doctor_id,
            'paciente_id' => $request->paciente_id,
            'consultorio_id' => $request->consultorio_id,
            'diagnostico' => $request->diagnostico,
            'tratamiento' => $request->tratamiento,
            'estado' => $request->estado,
        ]);
    
        return redirect()->route('citas.index')->with('success', 'Cita Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
