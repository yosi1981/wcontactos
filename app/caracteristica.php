<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristica extends Model
{
    protected $table = 'caracteristicas';

    protected $primaryKey = 'idcaracteristicas';

    public $timestamps = false;

    protected $fillable = [
        'pelo',
    ];

    protected $guarded = [
    ];

}
