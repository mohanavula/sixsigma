<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function program_level()
    {
        return $this->belongsTo('App\Models\ProgramLevel');
    }
    
    public function regulations()
    {
        return $this->hasMany('App\Models\Regulation');
    }

    public function specializations() {
        return $this->hasMany(Specialization::class);
    }
}
