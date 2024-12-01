<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Consultorio;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Paciente::all();
        return view('pacientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = ['Masculino', 'Femenino', 'Otro'];
        $tipos_documento = ['CC', 'TI', 'Pasaporte', 'RegistroCivil'];
    
        return view('pacientes.create', compact('generos', 'tipos_documento'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'tipo_documento' => 'required',
            'documento' => 'required',
            'eps' => 'required',
            'foto' => 'nullable|image',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'historial_medico' => 'required',
        ]);

        $foto = $request->file('foto');
        $name = null; // Valor predeterminado si no se sube una foto
        
        if ($foto) {
            $name = rand(1000000, 9999999) . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $name);
        }
        
        
        Paciente::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'tipo_documento' => $request->tipo_documento,
            'documento' => $request->documento,
            'eps' => $request->eps,
            'foto' => $name, 
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'historial_medico' => $request->historial_medico,
        ]);
    
        return redirect()->route('pacientes.index')->with('success', 'Paciente agregado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $data = Paciente::find($id);
        $citas = Cita::where('paciente_id', $id)->get();

        return view('pacientes.show', compact('data', 'citas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Paciente::find($id);
        return view('pacientes.edit', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'tipo_documento' => 'required',
            'documento' => 'required',
            'eps' => 'required',
            'foto' => 'nullable|image',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'historial_medico' => 'required',
        ]);
    
        // Obtener el doctor de la base de datos
        $paciente = Paciente::find($id);
    
        // Procesar la foto
        $foto = $request->file('foto');
        $name = null; // Valor predeterminado si no se sube una foto
        
        if ($foto) {
            $name = rand(1000000, 9999999) . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $name);
        }
    
        // Actualizar los datos del doctor
        $paciente->update([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'tipo_documento' => $request->tipo_documento,
            'documento' => $request->documento,
            'eps' => $request->eps,
            'foto' => $name,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'historial_medico' => $request->historial_medico,
        ]);
    
        return redirect()->route('pacientes.index')->with('success', 'Paciente Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
