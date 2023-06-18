<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBriefingProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefing_programs', function (Blueprint $table) {
            $table->id();
            $table->year('exam_year');
            $table->enum('exam_session', ['JAN', 'JUL']);
            $table->unsignedBigInteger('subject_id');
            $table->string('candidate_name', 255);
            $table->string('mailing_addr', 255)->nullable();
            $table->string('mobile', 15);
            $table->string('email', 255)->nullable();
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
        Schema::dropIfExists('briefing_programs');
    }
}