<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residuo extends Model
{
    use HasFactory;

    protected $table = 'residuos';

    protected $fillable = [
        'id',
        'nombre_residuo',
        'tipo_residuo',
        'cantidad_residuo',
        'descripcion_residuo',
        'deposito',
        'area'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
