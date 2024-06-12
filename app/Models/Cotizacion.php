<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cotizacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cotizaciones";
    protected $primaryKey = "id_cotizacion";
    protected $fillable = ["id_cliente", "id_vendedor", "num_personas", "id_empresa"];
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor');
    }
}
