<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name', 100);
            $table->string('desc', 255)->nullable();
            $table->boolean('active')->default(1);
            $table->string('sp_code', 3)->nullable();
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
        Schema::dropIfExists('mother_subjects');
    }
}