<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineeSubjectSwitchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainee_subject_switches', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no', 30);
            $table->date('ref_date', 15);
            $table->char('gender', 1)->nullable();
            $table->unsignedBigInteger('from_subject_id');
            $table->unsignedBigInteger('to_subject_id');
            $table->string('degree_type', 5);
            $table->string('candidate_name', 255);
            $table->string('registration_no', 255);
            $table->timestamps();
            $table->foreign('from_subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('to_subject_id')->references('id')->on('subjects')
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
        Schema::dropIfExists('trainee_subject_switches');
    }
}