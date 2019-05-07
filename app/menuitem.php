<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menuitem extends Model
{
    protected $table = 'menuitem';

    protected $primaryKey = 'idmenuitem';

    public $timestamps = false;

    protected $fillable = [
        'idmenu',
        'idmenuitem_padre',
        'Titulo',
        'Ruta',
        'session',
        'imagen',
    ];

    protected $guarded = [
    ];

}
