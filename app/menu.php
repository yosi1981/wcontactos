<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menus';

    protected $primaryKey = 'idmenu';

    public $timestamps = false;

    protected $fillable = [
        'idtipousuario',
    ];

    protected $guarded = [
    ];

}
