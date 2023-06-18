<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrientationCourseBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientation_course_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('bank_name', 100);
            $table->string('ac_no', 20);
            $table->string('ac_title', 255)->nullable();
            $table->char('paymet_type', 1)->default('C');
            $table->boolean('active')->default(true);
            $table->foreign('course_id')->references('id')->on('orientation_course_params')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orientation_course_banks');
    }
}