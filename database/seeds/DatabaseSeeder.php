<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * table: program_levels
         */
        $ug_id = DB::table('program_levels')->insertGetId(
            ['short_name' => 'UG', 'name' => 'Undergraduate']
        );

        $pg_id = DB::table('program_levels')->insertGetId(
            ['short_name' => 'PG', 'name' => 'Postgraduate']
        );

        /**
         * table: departments
         */
        $ced_id = DB::table('departments')->insertGetId([
            'short_name' => 'CED', 
            'name' => 'Civil Engineering Department', 
            'office_email' => 'office.ce@ksrmce.ac.in', 
            'hod_email' => 'office.ce@ksrmce.ac.in'
        ]);

        $eeed_id = DB::table('departments')->insertGetId([
            'short_name' => 'EEED', 
            'name' => 'Electrical and Electronics Engineering Department', 
            'office_email' => 'office.eee@ksrmce.ac.in', 
            'hod_email' => 'office.eee@ksrmce.ac.in'
        ]);

        $hsd_id = DB::table('departments')->insertGetId([
            'short_name' => 'HSD', 
            'name' => 'Humanities and Sciences Department', 
            'office_email' => 'office.hs@ksrmce.ac.in', 
            'hod_email' => 'office.hs@ksrmce.ac.in'
        ]);
        
        /**
         * table: programs
         */
        $btech_id = DB::table('programs')->insertGetId(
            ['program_level_id' => $ug_id, 'short_name' => 'B.Tech', 'name' => 'Bachelor of Technology']
        );

        $mtech_id = DB::table('programs')->insertGetId(
            ['program_level_id' => $pg_id, 'short_name' => 'M.Tech', 'name' => 'Master of Technology']
        );

        /**
         * table: regulations
         */
        $r14ug_id = DB::table('regulations')->insertGetId([
            'program_id' => $btech_id,
            'short_name' => 'R14UG',
            'name' => 'Regulations for UG Programs in Engineering (2014)',
            'start_year' => 2014,
            'end_year' => 2017,
            'total_semesters' => 7,
            'total_credits' => 220,
            'pass_cgpa' => 4.5,
            'in_force' => false
        ]);

        $r15ug_id = DB::table('regulations')->insertGetId([
            'program_id' => $btech_id,
            'short_name' => 'R15UG',
            'name' => 'Regulations for UG Programs in Engineering (2015)',
            'start_year' => 2015,
            'end_year' => 2018,
            'total_semesters' => 8,
            'total_credits' => 220,
            'pass_cgpa' => 4.5,
            'in_force' => false
        ]);

        /**
         * table: semesters
         */
        $r14ug_1_0_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '1-0',
            'name' => 'First Year',
            'duration' => 12,
            'credits' => 42,
            'sequence_number' => 1,
            'in_force' => false
        ]);

        $r14ug_2_1_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '2-1',
            'name' => 'Second Year - First Semester',
            'duration' => 6,
            'credits' => 24,
            'sequence_number' => 2,
            'in_force' => false
        ]);

        $r14ug_2_2_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '2-2',
            'name' => 'Second Year - Second Semester',
            'duration' => 6,
            'credits' => 24,
            'sequence_number' => 3,
            'in_force' => false
        ]);

        $r14ug_3_1_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '3-1',
            'name' => 'Third Year - First Semester',
            'duration' => 6,
            'credits' => 24,
            'sequence_number' => 4,
            'in_force' => false
        ]);

        $r14ug_3_2_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '3-2',
            'name' => 'Third Year - Second Semester',
            'duration' => 6,
            'credits' => 24,
            'sequence_number' => 5,
            'in_force' => false
        ]);

        $r14ug_4_1_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '4-1',
            'name' => 'Fourth Year - First Semester',
            'duration' => 6,
            'credits' => 24,
            'sequence_number' => 6,
            'in_force' => false
        ]);

        $r14ug_4_2_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r14ug_id,
            'short_name' => '4-2',
            'name' => 'Fourth Year - Second Semester',
            'duration' => 6,
            'credits' => 24,
            'sequence_number' => 7,
            'in_force' => false
        ]);

        /**
         * table: subject_offering_types
         */
        $core_id = DB::table('subject_offering_types')->insertGetId(
            ['description' => 'CORE']
        );

        $elective_id = DB::table('subject_offering_types')->insertGetId(
            ['description' => 'ELECTIVE']
        );

        $audit_id = DB::table('subject_offering_types')->insertGetId(
            ['description' => 'AUDIT']
        );

        $mandatory_id = DB::table('subject_offering_types')->insertGetId(
            ['description' => 'MANDATORY']
        );

        $skill_id = DB::table('subject_offering_types')->insertGetId(
            ['description' => 'SKILL']
        );

        /**
         * table: subjects
         */
        $s14251001 = DB::table('subjects')->insertGetId([
            'code' => '14251001',
            'short_name' => 'M1',
            'name' => 'Mathematics-1',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

    }
}
