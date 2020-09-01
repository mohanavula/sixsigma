<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicClassSection extends Model
{
    protected $guarded = [];

    public function academic_class() {
        return $this->belongsTo(AcademicClass::class);
    }
}
