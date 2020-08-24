<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function subjects(){
        return $this->hasMany(Subjects::class);
    }

    public function specializations() {
        return $this->hasMany(Specialization::class);
    }

    public function faculties() {
        return $this->hasMany(Faculty::class);
    }
}
