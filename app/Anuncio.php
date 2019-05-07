<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';

    protected $primaryKey = 'idanuncio';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descripcion',
        'idusuario',
        'idpelo',
        'idojos',
        'idestatura',
    ];

    protected $guarded = [
    ];

    public function UserAnunciante()
    {
        return $this->belongsTo('App\Useranunciante', 'idusuario', 'id');
    }

    public function ColorPelo()
    {
        return $this->belongsTo('App\caracteristica', 'idpelo', 'idcaracteristicas');
    }
    public function ColorOjos()
    {
        return $this->belongsTo('App\caracteristica', 'idojos', 'idcaracteristicas');
    }
    public function Estatura()
    {
        return $this->belongsTo('App\caracteristica', 'idestatura', 'idcaracteristicas');
    }

    /*  public function ProvinciaAnuncio()
    {
    return $this->belongsTo('App\Provincia', 'idlocalidad', 'idprovincia'); //mal
    }
     */
    public function ImagenesAnuncio()
    {
        return $this->belongsToMany('App\Imagen', 'imagenes_anuncios', 'idanuncio', 'idimagen');
    }

}
