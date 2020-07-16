<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    //
    public function program() {
        return $this->belongsTo('App\Models\Program');
    }

    public function semesters()
    {
        return $this->hasMany('App\Models\Semester');
    }

    

}
