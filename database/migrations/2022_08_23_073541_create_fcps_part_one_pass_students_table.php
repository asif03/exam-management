<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcpsPartOnePassStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcps_part_one_pass_students', function (Blueprint $table) {
            $table->id();
            $table->year('year')->nullable();
            $table->enum('session', ['JAN', 'JUL'])->nullable();
            $table->bigInteger('reg_no')->nullable();
            $table->string('roll', 20)->nullable();
            $table->string('applicant_name', 255);
            $table->string('father_name', 255);
            $table->string('mother_name', 255);
            $table->date('date_of_birth');
            $table->string('mailing_address', 500)->nullable();
            $table->string('present_address', 500)->nullable();
            $table->string('permanent_address', 500)->nullable();
            $table->string('national_id', 20)->nullable();
            $table->string('pen_number', 20);
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('contact_res', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('subject', 200)->nullable();
            $table->string('fcps_part_one_pass_session', 200)->nullable();
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')
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
        Schema::dropIfExists('fcps_part_one_pass_students');
    }
}