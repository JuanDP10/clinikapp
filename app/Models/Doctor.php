<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctores"; 
    protected $fillable = [
        'nombre',
        'foto',
        'especialidad',
        'telefono',
        'correo',
        'horario',
        'consultorio_id',
        'fecha_contratacion',
        'estado'
    ];

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
}
