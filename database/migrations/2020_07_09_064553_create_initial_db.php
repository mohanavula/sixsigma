<?php

use App\Helpers\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreateInitialDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table to model Departments. Eg: CE/CRI
         */
        Schema::create('departments', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('department_code', Constants::TITLE_SHORT_LENGTH)->primary();
            $table->string('department_name', Constants::TITLE_LENGTH);
            $table->string('department_email', Constants::EMAIL_LENGTH)->unique();
            $table->timestamps();
        });

        /**
         * Table to model Regulation. Eg: R14UG
         */
        Schema::create('regulations', function (Blueprint $table) {
            $table->string('regulation_code', Constants::TITLE_SHORT_LENGTH)->primary();
            $table->string('regulation_title', Constants::TITLE_LENGTH);
            $table->year('start_year');
            $table->year('last_year')->nullable();
            $table->json('program');
            $table->json('specializations')->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();
        });

        /**
         * Table to model students
         */
        Schema::create('students', function (Blueprint $table) {
            $table->string('regd_no', Constants::REGDNO_LENGTH)->primary();
            $table->string('given_name', Constants::NAME_LENGTH);
            $table->string('surname', Constants::NAME_LENGTH);
            $table->string('phone', Constants::PHONE_LENGTH)->unique();
            $table->string('email', Constants::EMAIL_LENGTH)->unique();
            $table->date('join_date');
            $table->json('program')->default(new Expression('(JSON_ARRAY())'));
            $table->json('guardian');
            $table->timestamps();
        });

        /**
         * Table to model faculty
         */
        Schema::create('faculty', function (Blueprint $table) {
            $table->string('id', Constants::REGDNO_LENGTH)->primary();
            $table->string('given_name', Constants::NAME_LENGTH);
            $table->string('surname', Constants::NAME_LENGTH);
            $table->string('phone', Constants::PHONE_LENGTH)->unique();
            $table->string('email', Constants::EMAIL_LENGTH)->unique();
            $table->date('join_date');
            $table->string('department_code', Constants::TITLE_SHORT_LENGTH)->index();
            $table->enum('designation', ['PROFESSOR', 'ASSOCIATE PROFESSOR', 'ASSISTANT PROFESSOR']);
            $table->timestamps();
            $table->foreign('department_code', 'f_faculty_department_code')
                ->references('department_code')
                ->on('departments')
                ->onDelete('cascade');
        });


        /**
         * Table to model subjects
         */
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('id', Constants::REGDNO_LENGTH);
            $table->string('subject_title', Constants::TITLE_LENGTH);
            $table->string('subject_code', Constants::TITLE_SHORT_LENGTH);
            $table->json('work_load');
            $table->string('department_code', Constants::TITLE_SHORT_LENGTH)->index();
            $table->enum('subject_type', ['CORE', 'ELECTIVE', 'AUDIT', 'SKILL']);
            $table->timestamps();
            $table->foreign('department_code', 'f_subjects_department_code')
                ->references('department_code')
                ->on('departments')
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
        
        Schema::table('faculty', function (Blueprint $table) {
            $table->dropForeign('f_faculty_department_code');
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('f_subjects_department_code');
        });

        Schema::dropIfExists('departments');
        Schema::dropIfExists('regulations');
        Schema::dropIfExists('students');
        Schema::dropIfExists('faculty');
        Schema::dropIfExists('subjects');
    }
}