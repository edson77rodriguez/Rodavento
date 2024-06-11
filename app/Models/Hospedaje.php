<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    use HasFactory;
    protected $table="hospedajes";
    protected $primaryKey='id_hospedaje';
    protected $fillable = [ 'descripcion','costo_entre_semana','costo_volumen','costo_fin','costo_especial'];
}
