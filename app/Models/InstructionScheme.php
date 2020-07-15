<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructionScheme extends Model
{
    protected $casts = [
        'subjects' => 'array',
        'scheme' => 'array',
    ];

    public function subject_category() {
        return $this->belongsTo('App\Models\SubjectCategory');
    }

    public function subject_offering_type() {
        return $this->belongsTo('App\Models\SubjectOfferingType');
    }
}
