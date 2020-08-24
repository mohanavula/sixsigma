<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function regulation()
    {
        return $this->belongsTo('App\Models\Regulation');
    }

    public function instruction_scheme()
    {
        return $this->hasMany('App\Models\InstructionScheme');
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }

}
 