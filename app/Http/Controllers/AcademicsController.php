<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\AcademicClassSection;
use App\Models\Exam;
use App\Models\InstructionScheme;

class AcademicsController extends Controller
{
    public function get_classes(Request $request) {
        return AcademicClass::with(['sections'])->get();
    }

    public function get_exams(Request $request) {
        return Exam::with(['exam_schedules'])->all();
    }

    public function store_exams(Request $request) {
        $exams = $request->exams;
        foreach($exams as $exam) {
            Exam::create([
                'short_name' => substr(uniqid(), 0, 8), //  $exam['short_name'],
                'name' => $exam['name'],
                'academic_year' => $exam['academic_year'],
                'start_date' => date('Y-m-d', strtotime(str_replace('-','/', $exam['start_date']))),
                'end_date' => date('Y-m-d', strtotime(str_replace('-','/', $exam['end_date']))),
                'exam_category' => $exam['exam_category'],
                'semester_id' => $exam['semester_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
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

    public function get_instruction_scheme(Request $request, $semester_id) {
        return InstructionScheme::with(['subjects'])->where('semester_id', $semester_id)->get();
    }
}
