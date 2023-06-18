<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrientationCourseParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientation_course_params', function (Blueprint $table) {
            $table->id();
            $table->year('course_year')->nullable();
            $table->enum('course_session', ['JAN', 'JUL']);
            $table->string('title', 255);
            $table->text('notice')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->decimal('fee', $precision = 15, $scale = 2)->default(0);
            $table->integer('student_limit')->nullable();
            $table->string('notice_link', 500)->nullable();
            $table->unsignedTinyInteger('subject_id')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('orientation_course_params');
    }
}