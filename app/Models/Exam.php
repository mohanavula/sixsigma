<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function exam_schedules() {
        return $this->hasMany(ExamSchedule::class);
    }
}
