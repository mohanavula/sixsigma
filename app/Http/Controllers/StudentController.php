<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    public function get_students($key) {
        
        // email
        if (filter_var($key, FILTER_VALIDATE_EMAIL)) {
            return Student::with(['regulation', 'regulation.program', 'specialization'])->where('email', $key)->firstOrFail();
        }

        // id
        if (filter_var($key, FILTER_VALIDATE_INT)) {
            return Student::with(['regulation', 'regulation.program', 'specialization'])->findOrFail($key);
        }

        // regdno
        if (strlen($key) == 10 && substr(strtoupper($key), 2, 2) == '9Y') {
            return Student::with(['regulation', 'regulation.program', 'specialization'])->where('regdno', $key)->firstOrFail();
        }

        // surname and given_name
        $students = Student::with(['regulation', 'regulation.program', 'specialization']) 
            ->where('surname', 'like', '%' . $key . '%')
            ->orWhere('given_name', 'like', '%' . $key . '%')
            ->latest()
            ->paginate(20);
        if ($students->count() > 0) {
            return $students;
        } else {
            return response("Student records bot found", 404);
        }
    }
}
