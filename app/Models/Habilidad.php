<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Habilidad extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_h_id','desc_h'];

    public function tipo_h()
    {
        return $this->belongsTo(Tipo_h::class);
    }
}
