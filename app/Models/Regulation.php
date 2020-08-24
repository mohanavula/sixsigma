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

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function scheme() {
        return $this->semesters->each(function($semester) {
            return $semester->instruction_scheme->load('subject_category', 'subject_offering_type', 'semester', 'specialization', 'subjects');
        });
    }

}
