<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamScheduleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_schedule_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_master_id');
            $table->unsignedBigInteger('fellow_id');
            $table->unsignedBigInteger('role_id');
            $table->char('email_sent', 1)->default('N');
            $table->char('sms_sent', 1)->default('N');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('schedule_master_id')->references('id')->on('exam_schedule_masters')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fellow_id')->references('id')->on('fellows')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('exam_schedule_roles')
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
        Schema::dropIfExists('exam_schedule_details');
    }
}
