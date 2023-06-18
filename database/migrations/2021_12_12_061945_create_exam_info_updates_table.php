<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamInfoUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_info_updates', function (Blueprint $table) {
            $table->id();
            $table->year('exam_year');
            $table->string('exam_session', 3);
            $table->string('roll_no', 6);
            $table->string('bmdc_reg_no', 50);
            $table->string('candidate_name', 255);
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('training_institute_id');
            $table->string('other_training_institute_name', 255)->nullable();
            $table->string('trainer_name', 255)->nullable();
            $table->unsignedBigInteger('course_institute_id');
            $table->string('other_course_institute_name', 255)->nullable();
            $table->year('course_year');
            $table->string('course_director', 255)->nullable();
            $table->string('present_posting', 500)->nullable();
            $table->string('institute_head', 255)->nullable();
            $table->string('mobile', 11);
            $table->string('remarks', 500)->nullable();
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('training_institute_id')->references('id')->on('training_institutes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_institute_id')->references('id')->on('training_institutes')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_info_updates');
    }
}