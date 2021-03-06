<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $guarded = [];

    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
