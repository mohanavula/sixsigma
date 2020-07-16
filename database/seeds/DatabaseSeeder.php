<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        DB::table('instruction_schemes')->delete();
        DB::table('regulations')->delete();
        DB::table('programs')->delete();
        DB::table('semesters')->delete();
        DB::table('specializations')->delete();
        DB::table('departments')->delete();
        DB::table('subject_categories')->delete();
        DB::table('subject_offering_types')->delete();
        DB::table('program_levels')->delete();

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

        $eced_id = DB::table('departments')->insertGetId([
            'short_name' => 'ECED', 
            'name' => 'Electronics and Communications Engineering Department', 
            'office_email' => 'office.ece@ksrmce.ac.in', 
            'hod_email' => 'office.ece@ksrmce.ac.in'
        ]);

        $med_id = DB::table('departments')->insertGetId([
            'short_name' => 'MED', 
            'name' => 'Mechanical Engineering Department', 
            'office_email' => 'office.me@ksrmce.ac.in', 
            'hod_email' => 'office.me@ksrmce.ac.in'
        ]);

        $csed_id = DB::table('departments')->insertGetId([
            'short_name' => 'CSED', 
            'name' => 'Computer Science and Engineering Department', 
            'office_email' => 'office.eee@ksrmce.ac.in', 
            'hod_email' => 'office.eee@ksrmce.ac.in'
        ]);

        $cri_id = DB::table('departments')->insertGetId([
            'short_name' => 'CRI', 
            'name' => 'Center for Research and Innovation', 
            'office_email' => 'cri@ksrmce.ac.in', 
            'hod_email' => 'cri@ksrmce.ac.in'
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
        $r18ug_id = DB::table('regulations')->insertGetId([
            'program_id' => $btech_id,
            'short_name' => 'R18UG',
            'name' => 'Regulations for UG Programs in Engineering (2018)',
            'start_year' => 2018,
            'total_semesters' => 8,
            'total_credits' => 160,
            'pass_cgpa' => 4.5,
            'in_force' => true
        ]);

        $r18pg_id = DB::table('regulations')->insertGetId([
            'program_id' => $mtech_id,
            'short_name' => 'R18PG',
            'name' => 'Regulations for PG Programs in Engineering (2018)',
            'start_year' => 2018,
            'total_semesters' => 4,
            'total_credits' => 60,
            'pass_cgpa' => 4.5,
            'in_force' => true
        ]);

        /**
         * table: semesters
         */
        $r18ug_1_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '1 Sem',
            'name' => 'First semester',
            'sequence_number' => 1,
            'in_force' => true
        ]);

        $r18ug_2_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '2 Sem',
            'name' => 'Second semester',
            'sequence_number' => 2,
            'in_force' => true
        ]);

        $r18ug_3_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '3 Sem',
            'name' => 'Third semester',
            'sequence_number' => 3,
            'in_force' => true
        ]);

        $r18ug_4_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '4 Sem',
            'name' => 'Third Year - First Semester',
            'sequence_number' => 4,
            'in_force' => true
        ]);

        $r18ug_5_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '5 Sem',
            'name' => 'Fifth Semester',
            'sequence_number' => 5,
            'in_force' => false
        ]);

        $r18ug_6_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '6 Sem',
            'name' => 'Sixth Semester',
            'sequence_number' => 6,
            'in_force' => true
        ]);

        $r18ug_7_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '7 Sem',
            'name' => 'Seventh Semester',
            'sequence_number' => 7,
            'in_force' => true
        ]);

        $r18ug_8_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '8 Sem',
            'name' => 'Eighth Semester',
            'sequence_number' => 8,
            'in_force' => true
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
        $s1821101 = DB::table('subjects')->insertGetId([
            'code' => '1821101',
            'short_name' => 'M1',
            'name' => 'Mathematics-1',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1823102 = DB::table('subjects')->insertGetId([
            'code' => '1823102',
            'short_name' => 'ECY',
            'name' => 'Engineering Chemistry',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1824103 = DB::table('subjects')->insertGetId([
            'code' => '1824103',
            'short_name' => 'Eng',
            'name' => 'English',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1825104 = DB::table('subjects')->insertGetId([
            'code' => '1825104',
            'short_name' => 'PPS',
            'name' => 'Programming for Problem Solving',
            'department_id' => $csed_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1823107 = DB::table('subjects')->insertGetId([
            'code' => '1823107',
            'short_name' => 'CYLab',
            'name' => 'Chemistry Lab',
            'department_id' => $hsd_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1821201 = DB::table('subjects')->insertGetId([
            'code' => '1821201',
            'short_name' => 'M2',
            'name' => 'Mathematics-2',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1822202 = DB::table('subjects')->insertGetId([
            'code' => '1822202',
            'short_name' => 'EPY',
            'name' => 'Engineering Physics',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1802205 = DB::table('subjects')->insertGetId([
            'code' => '1802205',
            'short_name' => 'BEE',
            'name' => 'Basic Electrical Engineering',
            'department_id' => $eeed_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1823301 = DB::table('subjects')->insertGetId([
            'code' => '1823301',
            'short_name' => 'BIOE',
            'name' => 'Biology for Engineers',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1821302 = DB::table('subjects')->insertGetId([
            'code' => '1821302',
            'short_name' => 'NM&PS',
            'name' => 'Numerical Methods and Probability & Statistics',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1825401 = DB::table('subjects')->insertGetId([
            'code' => '1825401',
            'short_name' => 'MEFA',
            'name' => 'Managerial Economics and Financial Analysis',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1824402 = DB::table('subjects')->insertGetId([
            'code' => '1824402',
            'short_name' => 'ETC',
            'name' => 'Effective Technical Communication',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        /**
         * table: specializations
         */
        $ce_id = DB::table('specializations')->insertGetId([
            'short_name' => 'CE',
            'name' => 'Civil Engineering',
            'department_id' => $ced_id,
            'program_id' => $btech_id,
            'in_force' => true
        ]);

        $eee_id = DB::table('specializations')->insertGetId([
            'short_name' => 'EEE',
            'name' => 'Electrical and Electronics Engineering',
            'department_id' => $eeed_id,
            'program_id' => $btech_id,
            'in_force' => true
        ]);

        $ede_id = DB::table('specializations')->insertGetId([
            'short_name' => 'ECE',
            'name' => 'Electronics and Comminications Engineering',
            'department_id' => $eced_id,
            'program_id' => $btech_id,
            'in_force' => true
        ]);

        $me_id = DB::table('specializations')->insertGetId([
            'short_name' => 'ME',
            'name' => 'Mechanical Engineering',
            'department_id' => $med_id,
            'program_id' => $btech_id,
            'in_force' => true
        ]);

        $cse_id = DB::table('specializations')->insertGetId([
            'short_name' => 'CSE',
            'name' => 'Computer Science and Engineering',
            'department_id' => $csed_id,
            'program_id' => $btech_id,
            'in_force' => true
        ]);

        /**
         * table: subject_categories
         */
        $bsc_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'BSC',
            'name' => 'Basic sciences',
        ]);

        $esc_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'ESC',
            'name' => 'Engineerig sciences',
        ]);

        $hsmc_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'HSMC',
            'name' => 'Humanities ans social sciences',
        ]);

        $pcc_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'PCC',
            'name' => 'Professional core',
        ]);

        $pec_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'PEC',
            'name' => 'Professional elective',
        ]);

        $oec_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'OEC',
            'name' => 'Open electives',
        ]);

        $lc_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'LC',
            'name' => 'Laboratory',
        ]);

        $mc_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'MC',
            'name' => 'Mandatory',
        ]);

        $proj_id = DB::table('subject_categories')->insertGetId([
            'short_name' => 'PROJ',
            'name' => 'Project',
        ]);

        /**
         * table: instruction_schemes
         */
        
        $ce11_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $bsc_id,
            'subject_offering_type_id' => $core_id,
            'subjects' => json_encode(['1821101']),
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'sequence_number' => 1,
        ]);
            
        $ce12_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $bsc_id,
            'subject_offering_type_id' => $core_id,
            'subjects' => json_encode(['1823102']),
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'sequence_number' => 2,
        ]);

        $ce13_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $hsmc_id,
            'subject_offering_type_id' => $core_id,
            'subjects' => json_encode(['1824103']),
            'scheme' => json_encode(['lectures' => 2, 'tutorials' => 0, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 2]),
            'sequence_number' => 3,
        ]);

        $ce14_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $esc_id,
            'subject_offering_type_id' => $core_id,
            'subjects' => json_encode(['1805104']),
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 0, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 3]),
            'sequence_number' => 4,
        ]);

        $ce15_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $bsc_id,
            'subjects' => json_encode(['1823107']),
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 3, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 1.5]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 5,
        ]);

        $ce16_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $esc_id,
            'subjects' => json_encode(['1805108']),
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 4, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 2]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 6,
        ]);

        $ce17_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $hsmc_id,
            'subjects' => json_encode(['1824109']),
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 2, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 1]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 7,
        ]);

        $ce21_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $bsc_id,
            'subjects' => json_encode(['1821201']),
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 1,
        ]);

        $ce17_id = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $hsmc_id,
            'subjects' => json_encode(['182202']),
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 2,
        ]);
    }
}
