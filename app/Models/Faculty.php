<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';
    protected $fillable = ['employee_code', 'surname', 'given_name', 'email', 'phone', 'gender', 'department_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function designation() {
        return $this->belongsTo(Designation::class);
    }
    
}
