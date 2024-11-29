<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Cita;
use App\Models\User;
use App\Models\Consultorio;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el estado de la solicitud, o 'todos' si no se especifica.
        $estado = $request->input('estado', 'todos');
    
        // Filtrar los doctores basados en el estado.
        if ($estado == 'todos') {
            $data = Doctor::all();  // Todos los doctores si el estado es 'todos'
        } else {
            $data = Doctor::where('estado', $estado)->get();  // Filtrar por estado
        }
    
        return view('doctores.index', compact('data', 'estado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los consultorios
        $consultorios = Consultorio::all();
    
        // Pasar la variable consultorios a la vista
        return view('doctores.create', compact('consultorios'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'nombre' => 'required',
            'foto' => 'required|image',
            'especialidad' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'horario' => 'required',
            'consultorio_id' => 'required',
            'fecha_contratacion' => 'required'
        ]);
        
        $consultorios = Consultorio::all();

        // Procesar la foto
        $foto = $request->file('foto');
        $name = rand(1000000, 9999999) . $foto->getClientOriginalName();
        $foto->move(public_path('images'), $name);
        
        // Crear una nueva instancia del modelo Doctor y guardar los datos
        Doctor::create([
            'nombre' => $request->nombre,
            'foto' => $name, // Guardar el nombre de la imagen en la BD
            'especialidad' => $request->especialidad,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'horario' => $request->horario,
            'consultorio_id' => $request->consultorio_id,
            'fecha_contratacion' => $request->fecha_contratacion,
        ]);
    
        return redirect()->route('doctores.index')->with('success', 'Doctor agregado correctamente');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $data = Doctor::find($id);
        $citas = Cita::where('doctor_id', $id)->get();

        return view('doctores.show', compact('data', 'citas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Doctor::findOrFail($id);
        $consultorios = Consultorio::all();
        return view('doctores.edit', compact('data', 'consultorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'foto' => 'required|image',
            'especialidad' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'horario' => 'required',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);
    
        // Obtener el doctor de la base de datos
        $doctor = Doctor::find($id);
    
        // Procesar la foto
        $foto = $request->file('foto');
        $name = rand(1000000, 9999999) . $foto->getClientOriginalName();
        $foto->move(public_path('images'), $name);
    
        // Actualizar los datos del doctor
        $doctor->update([
            'nombre' => $request->nombre,
            'foto' => $name, // Guardar el nombre de la imagen en la BD
            'especialidad' => $request->especialidad,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'horario' => $request->horario,
            'consultorio_id' => $request->consultorio_id,
        ]);
    
        return redirect()->route('doctores.index')->with('success', 'Doctor Actualizado Correctamente');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        // Cambiar el estado a 'inactivo'
        $doctor->estado = 'inactivo';
        $doctor->save();  // Guardar los cambios en la base de datos

        // Redirigir con un mensaje de éxito
        return redirect()->route('doctores.index')->with('success', 'Perfil desactivado correctamente.');
    }
}

