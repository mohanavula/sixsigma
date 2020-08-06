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
            'hod_email' => 'hod.ce@ksrmce.ac.in'
        ]);

        $eeed_id = DB::table('departments')->insertGetId([
            'short_name' => 'EEED', 
            'name' => 'Electrical and Electronics Engineering Department', 
            'office_email' => 'office.eee@ksrmce.ac.in', 
            'hod_email' => 'hod.eee@ksrmce.ac.in'
        ]);

        $eced_id = DB::table('departments')->insertGetId([
            'short_name' => 'ECED', 
            'name' => 'Electronics and Communications Engineering Department', 
            'office_email' => 'office.ece@ksrmce.ac.in', 
            'hod_email' => 'hod.ece@ksrmce.ac.in'
        ]);

        $med_id = DB::table('departments')->insertGetId([
            'short_name' => 'MED', 
            'name' => 'Mechanical Engineering Department', 
            'office_email' => 'office.me@ksrmce.ac.in', 
            'hod_email' => 'hod.me@ksrmce.ac.in'
        ]);

        $csed_id = DB::table('departments')->insertGetId([
            'short_name' => 'CSED', 
            'name' => 'Computer Science and Engineering Department', 
            'office_email' => 'office.cse@ksrmce.ac.in', 
            'hod_email' => 'hod.cse@ksrmce.ac.in'
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
            'semester_number' => 1,
            'in_force' => true
        ]);

        $r18ug_2_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '2 Sem',
            'name' => 'Second semester',
            'semester_number' => 2,
            'in_force' => true
        ]);

        $r18ug_3_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '3 Sem',
            'name' => 'Third semester',
            'semester_number' => 3,
            'in_force' => true
        ]);

        $r18ug_4_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '4 Sem',
            'name' => 'Third Year - First Semester',
            'semester_number' => 4,
            'in_force' => true
        ]);

        $r18ug_5_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '5 Sem',
            'name' => 'Fifth Semester',
            'semester_number' => 5,
            'in_force' => false
        ]);

        $r18ug_6_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '6 Sem',
            'name' => 'Sixth Semester',
            'semester_number' => 6,
            'in_force' => true
        ]);

        $r18ug_7_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '7 Sem',
            'name' => 'Seventh Semester',
            'semester_number' => 7,
            'in_force' => true
        ]);

        $r18ug_8_id = DB::table('semesters')->insertGetId([
            'regulation_id' => $r18ug_id,
            'short_name' => '8 Sem',
            'name' => 'Eighth Semester',
            'semester_number' => 8,
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
        // R18UG-CE-First Semester
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

        $s1805104 = DB::table('subjects')->insertGetId([
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

        $s1805108 = DB::table('subjects')->insertGetId([
            'code' => '1805108',
            'short_name' => 'CPLAB',
            'name' => 'Programming for Problem Solving Lab',
            'department_id' => $csed_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1824109 = DB::table('subjects')->insertGetId([
            'code' => '1824109',
            'short_name' => 'ENGLab',
            'name' => 'English Lab',
            'department_id' => $hsd_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        // R18UG-CE-Second Semester
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

        $s1803207 = DB::table('subjects')->insertGetId([
            'code' => '1803207',
            'short_name' => 'EG',
            'name' => 'Engineering Graphics and Design',
            'department_id' => $med_id,
            'is_theory' => true,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1822208 = DB::table('subjects')->insertGetId([
            'code' => '1822208',
            'short_name' => 'PYLab',
            'name' => 'Engineering Physics Lab',
            'department_id' => $eeed_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1802209 = DB::table('subjects')->insertGetId([
            'code' => '1802209',
            'short_name' => 'BEELab',
            'name' => 'Basic Electrical Engineering Lab',
            'department_id' => $eeed_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1803211 = DB::table('subjects')->insertGetId([
            'code' => '1803211',
            'short_name' => 'WS',
            'name' => 'Workshop and Manufacturing Practice',
            'department_id' => $med_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        // R18UG-CE-Third Semester
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
            'short_name' => 'NMPS',
            'name' => 'Numerical Methods and Probability & Statistics',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1803303 = DB::table('subjects')->insertGetId([
            'code' => '1803303',
            'short_name' => 'BME',
            'name' => 'Basic Mechanical Engineering',
            'department_id' => $med_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801304 = DB::table('subjects')->insertGetId([
            'code' => '1801304',
            'short_name' => 'EM',
            'name' => 'Engineering Mechanics',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801305 = DB::table('subjects')->insertGetId([
            'code' => '1801305',
            'short_name' => 'SURY',
            'name' => 'Surveying and Geomatics',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801306 = DB::table('subjects')->insertGetId([
            'code' => '1801306',
            'short_name' => 'BMC',
            'name' => 'Building Materials and Construction',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801307 = DB::table('subjects')->insertGetId([
            'code' => '1801307',
            'short_name' => 'CADLab',
            'name' => 'Computer Aided Civil Engineering Drawing Lab',
            'department_id' => $ced_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1801308 = DB::table('subjects')->insertGetId([
            'code' => '1801308',
            'short_name' => 'SURYLab',
            'name' => 'Surveying and Geomatics Lab',
            'department_id' => $ced_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1801309 = DB::table('subjects')->insertGetId([
            'code' => '1801309',
            'short_name' => 'CEWS',
            'name' => 'Civil Engineering Workshop',
            'department_id' => $ced_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        // R18UG-CE-Fourth Semester
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

        $s1801403 = DB::table('subjects')->insertGetId([
            'code' => '1801403',
            'short_name' => 'EGEO',
            'name' => 'Engineering Geology',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801404 = DB::table('subjects')->insertGetId([
            'code' => '1801404',
            'short_name' => 'FM',
            'name' => 'Fluid Mechanics',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801405 = DB::table('subjects')->insertGetId([
            'code' => '1801405',
            'short_name' => 'SM1',
            'name' => 'Solid Mechanics-1',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801406 = DB::table('subjects')->insertGetId([
            'code' => '1801406',
            'short_name' => 'DPPM',
            'name' => 'Disaster Preparedness and Planning Management',
            'department_id' => $ced_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s18994M1 = DB::table('subjects')->insertGetId([
            'code' => '18994M1',
            'short_name' => 'EnvS',
            'name' => 'Environmental Studies',
            'department_id' => $hsd_id,
            'is_theory' => true,
            'is_lab' => false,
            'is_project' => false
        ]);

        $s1801407 = DB::table('subjects')->insertGetId([
            'code' => '1801407',
            'short_name' => 'EGEOLab',
            'name' => 'Engineering Geology Lab',
            'department_id' => $ced_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1801408 = DB::table('subjects')->insertGetId([
            'code' => '1801408',
            'short_name' => 'FMLab',
            'name' => 'Fluid Mechanics Lab',
            'department_id' => $ced_id,
            'is_theory' => false,
            'is_lab' => true,
            'is_project' => false
        ]);

        $s1801409 = DB::table('subjects')->insertGetId([
            'code' => '1801409',
            'short_name' => 'SMLab',
            'name' => 'Solid Mechanics Lab',
            'department_id' => $ced_id,
            'is_theory' => false,
            'is_lab' => true,
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
        // R1UG-CE-First Semester
        $is_ce11 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $bsc_id,
            'subject_offering_type_id' => $core_id,
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'sequence_number' => 1,
        ]);
            
        $is_ce12 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $bsc_id,
            'subject_offering_type_id' => $core_id,
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'sequence_number' => 2,
        ]);

        $is_ce13 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $hsmc_id,
            'subject_offering_type_id' => $core_id,
            'scheme' => json_encode(['lectures' => 2, 'tutorials' => 0, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 2]),
            'sequence_number' => 3,
        ]);

        $is_ce14 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $esc_id,
            'subject_offering_type_id' => $core_id,
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 0, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 3]),
            'sequence_number' => 4,
        ]);

        $is_ce15 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $bsc_id,
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 3, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 1.5]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 5,
        ]);

        $is_ce16 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $esc_id,
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 4, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 2]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 6,
        ]);

        $is_ce17 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_1_id,
            'subject_category_id' => $hsmc_id,
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 2, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 1]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 7,
        ]);

        // R18UG-CE-Second Semester
        $is_ce21 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $bsc_id,
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 1,
        ]);

        $is_ce22 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $hsmc_id,
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 2,
        ]);

        $is_ce23 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $hsmc_id,
            'scheme' => json_encode(['lectures' => 3, 'tutorials' => 1, 'practicals' => 0, 'internal_marks' =>30, 'end_marks' => 70, 'credits' => 4]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 3,
        ]);

        $is_ce24 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $esc_id,
            'scheme' => json_encode(['lectures' => 1, 'tutorials' => 0, 'practicals' => 4, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 3]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 4,
        ]);

        $is_ce25 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $bsc_id,
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 3, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 1.5]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 5,
        ]);

        $is_ce26 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $esc_id,
            'scheme' => json_encode(['lectures' => 0, 'tutorials' => 0, 'practicals' => 2, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 1]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 6,
        ]);

        $is_ce27 = DB::table('instruction_schemes')->insertGetId([
            'specialization_id' => $ce_id,
            'semester_id' => $r18ug_2_id,
            'subject_category_id' => $bsc_id,
            'scheme' => json_encode(['lectures' => 1, 'tutorials' => 0, 'practicals' => 4, 'internal_marks' =>50, 'end_marks' => 50, 'credits' => 3]),
            'subject_offering_type_id' => $core_id,
            'sequence_number' => 7,
        ]);

        // R18UG-CE-Third Semester
        $data = [
            [$bsc_id, 2, 0, 0, 30, 70, 2, $core_id, $s1823301],
            [$bsc_id, 2, 1, 0, 30, 70, 3, $core_id, $s1821302],
            [$esc_id, 2, 1, 0, 30, 70, 3, $core_id, $s1803303],
            [$pcc_id, 3, 1, 0, 30, 70, 4, $core_id, $s1801304],
            [$pcc_id, 2, 1, 0, 30, 70, 3, $core_id, $s1801305],
            [$pcc_id, 2, 1, 0, 30, 70, 3, $core_id, $s1801306],
            [$pcc_id, 0, 0, 4, 50, 50, 2, $core_id, $s1801307],
            [$pcc_id, 0, 0, 2, 50, 50, 1, $core_id, $s1801308],
            [$pcc_id, 0, 0, 2, 50, 50, 1, $core_id, $s1801309]
        ];

        foreach($data as $index => $d) {
            $id = DB::table('instruction_schemes')->insertGetId([
                'specialization_id' => $ce_id,
                'semester_id' => $r18ug_3_id,
                'subject_category_id' => $d[0],
                'scheme' => json_encode(['lectures' => $d[1], 'tutorials' => $d[2], 'practicals' => $d[3], 'internal_marks' => $d[4], 'end_marks' => $d[5], 'credits' => $d[6]]),
                'subject_offering_type_id' => $d[7],
                'sequence_number' => $index + 1,
            ]);

            DB::table('instruction_scheme_subject')->insert([
                ['instruction_scheme_id' => $id, 'subject_id' => $d[8]]
            ]);
        }

        // R18UG-CE-Fourth Semester
        $data = [
            [$oec_id, 2, 1, 0, 30, 70, 3, $elective_id, $s1825401],
            [$hsmc_id, 2, 1, 0, 30, 70, 3, $core_id, $s1824402],
            [$pcc_id, 2, 0, 0, 30, 70, 2, $core_id, $s1801403],
            [$pcc_id, 3, 1, 0, 30, 70, 4, $core_id, $s1801404],
            [$pcc_id, 2, 1, 0, 30, 70, 4, $core_id, $s1801405],
            [$pcc_id, 2, 0, 0, 30, 70, 2, $core_id, $s1801406],
            [$mc_id, 2, 0, 0, 30, 70, 0, $mandatory_id, $s18994M1],
            [$pcc_id, 0, 0, 2, 50, 50, 1, $core_id, $s1801407],
            [$pcc_id, 0, 0, 3, 50, 50, 1.5, $core_id, $s1801408],
            [$pcc_id, 0, 0, 3, 50, 50, 1, $core_id, $s1801409]
        ];

        foreach($data as $index => $d) {
            $id = DB::table('instruction_schemes')->insertGetId([
                'specialization_id' => $ce_id,
                'semester_id' => $r18ug_4_id,
                'subject_category_id' => $d[0],
                'scheme' => json_encode(['lectures' => $d[1], 'tutorials' => $d[2], 'practicals' => $d[3], 'internal_marks' => $d[4], 'end_marks' => $d[5], 'credits' => $d[6]]),
                'subject_offering_type_id' => $d[7],
                'sequence_number' => $index + 1,
            ]);

            DB::table('instruction_scheme_subject')->insert([
                ['instruction_scheme_id' => $id, 'subject_id' => $d[8]]
            ]);
        }


        /**
         * table: instruction_scheme_subject
         */
        DB::table('instruction_scheme_subject')->insert([
            // R18UG-CE-First Semester 
            ['instruction_scheme_id' => $is_ce11, 'subject_id' => $s1821101],
            ['instruction_scheme_id' => $is_ce12, 'subject_id' => $s1823102],
            ['instruction_scheme_id' => $is_ce13, 'subject_id' => $s1824103],
            ['instruction_scheme_id' => $is_ce14, 'subject_id' => $s1805104],
            ['instruction_scheme_id' => $is_ce15, 'subject_id' => $s1823107],
            ['instruction_scheme_id' => $is_ce16, 'subject_id' => $s1805108],
            ['instruction_scheme_id' => $is_ce17, 'subject_id' => $s1824109],

            // R18UG-CE-Second Semester
            ['instruction_scheme_id' => $is_ce21, 'subject_id' => $s1821201],
            ['instruction_scheme_id' => $is_ce22, 'subject_id' => $s1822202],
            ['instruction_scheme_id' => $is_ce23, 'subject_id' => $s1802205],
            ['instruction_scheme_id' => $is_ce24, 'subject_id' => $s1803207],
            ['instruction_scheme_id' => $is_ce25, 'subject_id' => $s1822208],
            ['instruction_scheme_id' => $is_ce26, 'subject_id' => $s1802209],
            ['instruction_scheme_id' => $is_ce27, 'subject_id' => $s1803211],
        ]);
    }
}
