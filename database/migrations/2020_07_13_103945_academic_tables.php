<?php

use App\Helpers\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcademicTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table to model Program level. Eg: UG
         */
        Schema::create('program_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->timestamps();
        });

        /**
         * Table to model Department. Eg: CE
         */
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->string('office_email', Constants::EMAIL_LENGTH);
            $table->string('hod_email', Constants::EMAIL_LENGTH);
            $table->timestamps();
        });

        /**
         * Table to model Program. Eg: B.Tech
         */
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('program_level_id')->index();
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->timestamps();
            $table->foreign('program_level_id', 'f_programs_program_level_id')
                ->references('id')
                ->on('program_levels')
                ->onDelete('cascade');
        });

        /**
         * Table to model Regulation. Eg: R14UG
         */
        Schema::create('regulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('program_id')->index();
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->year('start_year');
            $table->year('end_year')->nullable();
            $table->unsignedBigInteger('total_semesters');
            $table->unsignedBigInteger('total_credits');
            $table->unsignedDecimal('pass_cgpa');
            $table->boolean('in_force')->default(false);
            $table->timestamps();
            $table->foreign('program_id', 'f_regulations_program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');
        });

        /**
         * Table to model Semester. Eg: First Semester
         */
        Schema::create('semesters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('regulation_id')->index();
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->unsignedBigInteger('sequence_number');
            $table->boolean('in_force')->default(false);
            $table->timestamps();
            $table->foreign('regulation_id', 'f_semesters_regulation_id')
                ->references('id')
                ->on('regulations')
                ->onDelete('cascade');
        });

        /**
         * Table to model Subject offering type. Eg: Core
         */
        Schema::create('subject_offering_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description', Constants::TITLE_LENGTH);
            $table->timestamps();
        });

        /**
         * Table to model Subject. Eg: Engineering Mechanics
         */
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->unsignedBigInteger('department_id');
            $table->boolean('is_theory')->default(false);
            $table->boolean('is_lab')->default(false);
            $table->boolean('is_project')->default(false);
            $table->timestamps();
            $table->foreign('department_id', 'f_subjects_department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
        });

        /**
         * Table to model Specialization (Branch). Eg: Civil Engineering
         */
        Schema::create('specializations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short_name', Constants::TITLE_SHORT_LENGTH)->unique();
            $table->string('name', Constants::TITLE_LENGTH);
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('program_id');
            $table->boolean('in_force')->default(false);
            $table->timestamps();
            $table->foreign('department_id', 'f_specializations_department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table->foreign('program_id', 'f_specializations_program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');
        });

        /**
         * Table to model subject category. Eg: PCC
         */
        Schema::create('subject_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short_name')->unique();
            $table->string('name');
        });

        /**
         * Table to model curriculum. This is master table
         */
        Schema::create('instruction_schemes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('subject_category_id');
            $table->unsignedBigInteger('subject_offering_type_id');
            $table->longText('subjects');
            $table->longText('scheme');
            $table->unsignedBigInteger('sequence_number');
            $table->timestamps();
            $table->foreign('subject_offering_type_id', 'f_instruction_schemes_subject_offering_type_id')
                ->references('id')
                ->on('subject_offering_types')
                ->onDelete('cascade');
            $table->foreign('subject_category_id', 'f_instruction_schemes_subject_category_id')
                ->references('id')
                ->on('subject_categories')
                ->onDelete('cascade');
            $table->foreign('semester_id', 'f_instruction_schemes_semester_id')
                ->references('id')
                ->on('semesters')
                ->onDelete('cascade');
        });

        /**
         * Table to model curriculum. This is join table b/w instruction_schemes and subjects
         */
        Schema::create('instruction_schemes_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('instruction_scheme_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();
            $table->primary(['instruction_scheme_id', 'subject_id'], 'pk_instruction_scheme_id_subject_id');
            $table->foreign('instruction_scheme_id', 'f_instruction_schemes_subjects_instruction_scheme_id')
                ->references('id')
                ->on('instruction_schemes')
                ->onDelete('cascade');
            $table->foreign('subject_id', 'f_instruction_schemes_subjects_subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specializations', function (Blueprint $table) {
            $table->dropForeign('f_specializations_department_id');
            $table->dropForeign('f_specializations_program_id');
        });

        Schema::table('instruction_schemes_subjects', function (Blueprint $table) {
            $table->dropForeign('f_instruction_schemes_subjects_instruction_scheme_id');
            $table->dropForeign('f_instruction_schemes_subjects_subject_id');
        });
        
        Schema::table('instruction_schemes', function (Blueprint $table) {
            $table->dropForeign('f_instruction_schemes_subject_offering_type_id');
            $table->dropForeign('f_instruction_schemes_subject_category_id');
            $table->dropForeign('f_instruction_schemes_semester_id');
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('f_subjects_department_id');
        });

        Schema::table('semesters', function (Blueprint $table) {
            $table->dropForeign('f_semesters_regulation_id');
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign('f_programs_program_level_id');
        });

        Schema::table('regulations', function (Blueprint $table) {
            $table->dropForeign('f_regulations_program_id');
        });
        
        Schema::dropIfExists('specializations');
        Schema::dropIfExists('instruction_schemes_subjects');
        Schema::dropIfExists('instruction_schemes');
        Schema::dropIfExists('subject_offering_types');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('regulations');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('program_levels');
    }
}