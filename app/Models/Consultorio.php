<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $fillable = [
        'numero_consultorio',
        'piso',
        'estado'
    ];

    public function doctor()
    {
        return $this->has_one(Doctor::class);
    }
}
