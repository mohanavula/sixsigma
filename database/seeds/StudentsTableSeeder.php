<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Excel::toCollection(null, storage_path('students.csv'));
        echo $students[0]->count();
    }
}
