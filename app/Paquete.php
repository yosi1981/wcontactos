<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';

    protected $primaryKey = 'idpaquete';

    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'idanunciante',
        'total',
        'dcontratados',
        'drestantes',
        'fechaReg',
        'fechaUlt',
        'parte_partner',
        'parte_adminpro',
        'parte_admin',
        'Estado',
    ];

    public function UserAnunciante()
    {
        return $this->hasOne('App\Useranunciante', 'id', 'idanunciante');
    }

    public function Usos()
    {
        return $this->hasMany('App\AnuncioDia', 'idpaquete', 'idpaquete')->orderByDesc('fecha');;
    }
}
