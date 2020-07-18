<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructionScheme extends Model
{
    protected $casts = [
        'scheme' => 'array',
    ];

    public function subject_category() {
        return $this->belongsTo('App\Models\SubjectCategory');
    }

    public function subject_offering_type() {
        return $this->belongsTo('App\Models\SubjectOfferingType');
    }

    public function semester() {
        return $this->belongsTo('App\Models\Semester');
    }

    public function specialization() {
        return $this->belongsTo('App\Models\Specialization');
    }

    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }
}
