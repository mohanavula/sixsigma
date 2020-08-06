<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class SubjectMeta extends Model
{
    protected $table = 'subject_meta';
    protected $fillable = ['category', 'auther_email', 'data', 'subject_id'];
    
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}