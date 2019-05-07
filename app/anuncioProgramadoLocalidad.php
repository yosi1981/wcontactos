<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anuncioProgramadoLocalidad extends Model
{
    protected $table = 'anunciosProLocalidad';

    protected $primaryKey = 'idanuncioProLocalidad';

    public $timestamps = false;

    protected $fillable = [
        'idanuncioProgramado',
        'idprovincia',
        'idlocalidad',
    ];

    protected $guarded = [
    ];

    public function provincia()
    {
        return $this->belongsTo('App\Provincia', 'idprovincia', 'idprovincia');
    }
    public function localidad()
    {
        return $this->belongsTo('App\Poblacion', 'idlocalidad', 'idlocalidad');
    }
    public function AnuncioProgramado()
    {
        return $this->belongsTo('App\AnuncioProgramado', 'idanuncio_programado', 'idanuncioProgramado');
    }

}
