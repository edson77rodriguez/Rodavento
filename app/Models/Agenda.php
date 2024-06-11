<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table="agendas";
    protected $primaryKey='id_agenda';
    protected $fillable = [ 'inicio','fin','actividad','lugar','equipo','montaje','comentarios']; 
}
