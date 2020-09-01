<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $guarded = [];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    public function sections() {
        return $this->hasMany(AcademicClassSection::class);
    }
}
