<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    public function regulation() {
        return $this->belongsTo(Regulation::class);
    }
    
    public function exam_regiatration_marks() {
        return $this->hasMany(ExamRegistrationMark::class);
    }

    public function stats_grades() {
        return $this->hasMany(StatsGrade::class);
    }

    public function stats_gpas() {
        return $this->hasMany(StatsGpa::class);
    }
}
