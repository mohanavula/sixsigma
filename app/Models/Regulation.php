<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    //
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'regulation_code';

    protected $attributes = [
        'last_year' => null,
    ];
}
