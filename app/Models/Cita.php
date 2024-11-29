<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'fecha', 
        'hora', 
        'doctor_id', 
        'paciente_id',
        'consultorio_id', 
        'diagnstico', 
        'tratamiento', 
        'estado'];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function consultorio(){
        return  $this->belongsTo(Consultorio::class);
    }
}
