<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

}
