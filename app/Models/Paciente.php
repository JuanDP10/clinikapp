<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nombre', 
        'fecha_nacimiento',
        'genero',
        'tipo_documento',
        'documento',
        'eps',
        'foto', 
        'correo', 
        'telefono', 
        'direccion',
        'historial_medico'
    ];

    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
