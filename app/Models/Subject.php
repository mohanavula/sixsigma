<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function instruction_schemes() {
        return $this->belongsToMany(InstructionScheme::class);
    }

    public function syllabus() {
        return $this->hasOne(Syllabus::class);
    }

    public function metadata() {
        return $this->hasMany(SubjectMeta::class);
    }
}
