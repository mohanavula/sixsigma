<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class SubjectMeta extends Model
{
    /*
    * category: ['review', 'rating', 'resource']
    * data
    *   review: {comment: string }
    *   rating: {stars: 1-5, comment: string?}
    *   resource: {title: string, description: string, url: string? (pdf only)}
    */
    
    protected $table = 'subject_meta';
    protected $fillable = ['category', 'auther_email', 'data', 'subject_id'];
    
    protected $casts = [
        'data' => 'array',
    ];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}