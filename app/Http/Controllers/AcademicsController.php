<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\AcademicClassSection;

class AcademicsController extends Controller
{
    public function get_classes(Request $request) {
        return AcademicClass::with(['sections'])->get();
    }

    public function store_classes_sections(Request $request) {
        $class_list = $request->class_list;
        $section_labels = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        foreach($class_list as $class) {
            // return response($class, 200);
            $c = AcademicClass::with(['sections'])
                ->where('semester_id', $class['semester_id'])
                ->where('specialization_id', $class['specialization_id'])
                ->where('academic_year', $class['academic_year'])
                ->get();
            if ($c->count() == 0) { // new class. Add class and sections
                $db_class = AcademicClass::create([
                    'semester_id' => $class['semester_id'],
                    'specialization_id' => $class['specialization_id'],
                    'academic_year' => $class['academic_year'],
                    'name' => $class['name'],
                    'start_date' => date('Y-m-d', strtotime(str_replace('-','/', $class['start_date']))),
                    'end_date' => date('Y-m-d', strtotime(str_replace('-','/', $class['end_date']))),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                for($s = 0; $s < min($class['sections'], 8); $s++ ) {
                    $db_class->sections()->create([
                        'section' => $section_labels[$s],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            else { // existing class. add sections
                $start = $c->sections()->count();
                $end = min($start + $class['sections'], 8); 
                for($s = start; $s < $end; $s++ ) {
                    $c->sections()->create([
                        'section' => $section_labels[$s],
                        'start_date' => date('Y-m-d', strtotime(str_replace('-','/', $class['start_date']))),
                        'end _date' => date('Y-m-d', strtotime(str_replace('-','/', $class['end_date']))),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
