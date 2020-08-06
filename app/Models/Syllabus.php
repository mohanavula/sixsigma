<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table = 'syllabus';
    protected $fillable = ['objectives', 'cos', 'syllabus', 'textbooks', 'reference_books', 'subject_id'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
