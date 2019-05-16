<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'dias',
        'importe',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'status',
    ];
    protected $guarded = [
    ];
}
