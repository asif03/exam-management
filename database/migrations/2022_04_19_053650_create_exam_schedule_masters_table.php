<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamScheduleMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_schedule_masters', function (Blueprint $table) {
            $table->id();
            $table->year('exam_year');
            $table->enum('exam_session', ['JAN', 'JUL']);
            $table->unsignedBigInteger('exam_type_id');
            $table->unsignedBigInteger('mother_subject_id');
            $table->date('exam_date');
            $table->string('exam_start_time', 8);
            $table->string('exam_end_time', 8);
            $table->string('reporting_time', 8)->nullable();
            $table->unsignedBigInteger('hall_id');
            $table->boolean('is_schedule_meeting')->default(false);
            $table->date('meeting_date')->nullable();
            $table->string('meeting_time', 8)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('exam_type_id')->references('id')->on('exam_types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mother_subject_id')->references('id')->on('mother_subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hall_id')->references('id')->on('exam_halls')
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
        Schema::dropIfExists('exam_schedule_masters');
    }
}
