<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MarksImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportMarksController extends Controller
{
    public function import_marks(Request $request) {
        // Excel::import(new MarksImport, 'marks.csv');
        $marks_collection = Excel::toCollection(null, request()->file('marks_file'));
        $marks_collection = $marks_collection[0]->slice(1);
        $math_marks = $marks_collection->filter(function($value, $key) {
            return $value[1] == 1821101;
        });
        return $math_marks->pluck(2)->zip($math_marks->pluck(3));
    }
}
