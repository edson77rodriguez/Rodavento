<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = "empresas";

    // Especificar la clave primaria de la tabla
    protected $primaryKey = 'id_empresa';

    // Especificar los campos que se pueden asignar de manera masiva
    protected $fillable = [
        'nom',
        'ubicacion',
        'correo',
        'rfc'
    ];
}
