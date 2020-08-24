<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $guarded = [];

    public function faculties () {
        return $this->hasMany(Faculty::class);
    }
}
