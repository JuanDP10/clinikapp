<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;
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
        return view('pacientes.create');
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
            'foto' => 'required|image',
            'correo' => 'required',
            'telefono' => 'required',
            'dirección' => 'required',
            'historial_medico' => 'required',
        ]);

        // Procesar la foto
        $foto = $request->file('foto');
        $name = rand(1000000, 9999999) . $foto->getClientOriginalName();
        $foto->move(public_path('images'), $name);
        
        // Crear una nueva instancia del modelo Doctor y guardar los datos
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
            'dirección' => $request->direccion,
            'historial_medico' => $request->historial_medico,
        ]);
    
        return redirect()->route('pacientes.index')->with('success', 'Doctor agregado correctamente');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
