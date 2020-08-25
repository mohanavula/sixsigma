<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 0 -> regdno
        // 1 -> surname
        // 2 -> given_name
        // 3 -> email
        // 4 -> join_year
        // 5 -> phone
        // 6 -> is_lateral_entry
        // 7 -> social_category
        // 8 -> admission_category
        // 9 -> residency
        // 10 -> gender
        // 11 -> specialization_id
        // 12 -> regulation_id

        $students = Excel::toCollection(null, storage_path('students.csv'))[0];

        foreach ($students->splice(1) as $s) {
            try {
                $student = new Student();
                $student->regdno = $s[0];
                $student->surname = $s[1];
                $student->given_name = $s[2];
                $student->email = $s[3];
                $student->join_year = $s[4];
                $student->phone = $s[5];
                $student->is_lateral_entry = $s[6];
                $student->social_category = $s[7];
                $student->admission_category = $s[8];
                $student->residency = $s[9];
                $student->gender = $s[10];
                $student->specialization_id = $s[11];
                $student->regulation_id = 1; //$s[12];
                $student->created_at = now();
                $student->updated_at = now();
                $student->save();
            } catch (Exception $e) {
                echo $s[0] . "\n";
            }
        }
    }
}