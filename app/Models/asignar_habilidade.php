<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignar_habilidade extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'asignar_habilidades';

    // Campos que pueden ser llenados
    protected $fillable = [
        'guia_id',
        'habilidads_id',
        'fecha_emision',
        'fecha_vencimiento',
    ];

    // Relaciones
    public function guia()
    {
        return $this->belongsTo(Guia::class, 'guia_id');
    }

    public function habilidad()
    {
        return $this->belongsTo(Habilidad::class, 'habilidads_id');
    }
}
