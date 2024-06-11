<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table="departamentos";
    protected $primaryKey='id_departamento';
    protected $fillable = [
        'tipo',
        'departamento',
        'costo',
        'precio_sin_iva',
        'iva',
        'subtotal',
        'servicio',
        'total',
        'observaciones'
    ];


}
