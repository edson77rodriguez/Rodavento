<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id_pers';

    protected $fillable = [
        'nom', 'ap', 'am', 'num_tel', 'rfc', 'corre_elect'
    ];
}
