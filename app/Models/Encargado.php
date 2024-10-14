<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id','area_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
