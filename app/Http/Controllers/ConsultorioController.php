<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Consultorio;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el estado de la solicitud, predeterminado 'todos'.
        $estado = strtolower($request->input('estado', 'todos')); // Convertir a minúsculas para consistencia
    
        // Filtrar los consultorios basados en el estado.
        if ($estado == 'todos') {
            $data = Consultorio::all(); // Mostrar todos los consultorios
        } else {
            $data = Consultorio::where('estado', ucfirst($estado))->get(); // Coincidir con la base de datos
        }
    
        // Pasar 'data' y 'estado' a la vista
        return view('consultorios.index', compact('data', 'estado'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'numero_consultorio' => 'required',
            'piso' => 'required',
        ]);
    
        // Crear el nuevo consultorio
        Consultorio::create($request->all());
    
        // Redirigir a la vista de índice con mensaje de éxito y pasando el estado actual
        return redirect()->route('consultorios.index', ['estado' => $request->estado ?? 'todos'])->with('success', 'Consultorio Creado Correctamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Consultorio $consultorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(String $id)
    {   
        $data = Consultorio::find($id);
        
        return view('consultorios.edit', compact('data'));
    }


    public function update(Request $request, String $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'numero_consultorio' => 'required',
            'piso' => 'required',
            'estado' => 'required|in:disponible,mantenimiento', // Validación para el campo 'estado'
        ]);
    
        // Buscar el consultorio
        $data = Consultorio::find($id);
    
        // Actualizar los datos del consultorio
        $data->update([
            'numero_consultorio' => $request->numero_consultorio,
            'piso' => $request->piso,
            'estado' => $request->estado, // Actualización del estado
        ]);
    
        // Redirigir a la vista de índice con mensaje de éxito
        return redirect()->route('consultorios.index')->with('success', 'Consultorio Actualizado Correctamente');
    }
    

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // Intentar encontrar el consultorio por su ID
        $consultorio = Consultorio::find($id);
    
        // Cambiar el estado a 'mantenimiento'
        $consultorio->estado = 'mantenimiento';
        $consultorio->save();  // Guardar los cambios en la base de datos
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('consultorios.index')->with('success', 'Consultorio en Mantenimiento.');
    }
    
}
