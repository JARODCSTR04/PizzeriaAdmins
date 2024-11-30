<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    protected $table = 'materia_prima';

    protected $fillable = [
        'foto',
        'nombre',
        'cantidad',
        'fecha_ingreso',
        'costo',
        'categoria',
    ];
}
