<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AnuncioProgramado extends Model
{
    protected $table = 'anuncios_programados';

    protected $primaryKey = 'idanuncio_programado';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descripcion',
        'idusuario',
        'idpelos',
        'idojos',
        'idestatura',
    ];

    protected $guarded = [
    ];
    public function localidadesAP()
    {
        return $this->hasMany('App\anuncioProgramadoLocalidad', 'idanuncio_programado', 'idanuncio_programado');
    }
    public function UserAnunciante()
    {
        return $this->belongsTo('App\Useranunciante', 'idusuario', 'id');
    }
    public function ColorPelo()
    {
        return $this->belongsTo('App\caracteristica', 'idpelos', 'idcaracteristicas');
    }
    public function ColorOjos()
    {
        return $this->belongsTo('App\caracteristica', 'idojos', 'idcaracteristicas');
    }
    public function Estatura()
    {
        return $this->belongsTo('App\caracteristica', 'idestatura', 'idcaracteristicas');
    }
    public function ImagenesAnuncio()
    {
        return $this->belongsToMany('App\Imagen', 'imagenes_anuncios_programados', 'idanuncio_programado', 'idimagen');
    }

}
