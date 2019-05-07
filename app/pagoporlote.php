<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagoporlote extends Model
{

    protected $table = 'pagosporlotes';

    protected $primaryKey = 'idpagosporlotes';

    public $timestamps = false;

    protected $fillable = [
        'payout_batch_id',
    ];

    protected $guarded = [
    ];

}
