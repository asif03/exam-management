<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlliedSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allied_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mother_subject_id');
            $table->unsignedBigInteger('subject_id');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->foreign('mother_subject_id')->references('id')->on('mother_subjects')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('allied_subjects');
    }
}