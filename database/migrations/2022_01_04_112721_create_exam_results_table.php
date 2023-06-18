<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->year('exam_year');
            $table->string('exam_session', 3);
            $table->integer('roll', false, true)->length(6);
            $table->string('name', 255);
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('exam_name_id')->nullable();
            $table->unsignedBigInteger('batch_no')->nullable();
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('exam_name_id')->references('id')->on('exam_exam_names')
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
        Schema::dropIfExists('exam_results');
    }
}