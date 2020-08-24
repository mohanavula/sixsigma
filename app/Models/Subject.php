<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function instruction_schemes() {
        return $this->belongsToMany(InstructionScheme::class);
    }

    public function syllabus() {
        return $this->hasOne(Syllabus::class);
    }

    public function metadata() {
        return $this->hasMany(SubjectMeta::class);
    }

    public function exam_schedules() {
        return $this->hasMany(ExamSchedule::class);
    }

    public function rating_summary() {
        $ratings = DB::table('subject_meta')->where([
            ['subject_id', '=', $this->id],
            ['category', '=', 'rating']
        ])->get();

        $points = 0; $rating = 0;
        $ones = 0; $twos = 0; $threes = 0; $fours = 0; $fives = 0;
        if ($ratings->count() > 0){
            foreach($ratings as $item) {
                switch (json_decode($item->data)->stars) {
                    case 1:
                        $ones++;
                        break;
                    case 2:
                        $twos++;
                        break;
                    case 3:
                        $threes++;
                        break;
                    case 4:
                        $fours++;
                        break;
                    case 5:
                        $fives++;
                        break;
                }
            }
            $points = $ones + 2 * $twos + 3 * $threes + 4 * $fours + 5 * $fives;
            $count = $ones + $twos + $threes + $fours + $fives;
            $rating = ceil($points / $count);
        }
        return json_encode(['rating' => $rating, 'count' => $total, 'ones' => $ones, 'twos' => $twos, 'threes' => $threes, 'fours' => $fours, 'fives' => $fives]); 
    }
}
