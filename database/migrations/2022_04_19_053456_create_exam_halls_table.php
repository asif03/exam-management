<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_halls', function (Blueprint $table) {
            $table->id();
            $table->string('hall_name', 55);
            $table->unsignedBigInteger('block_id');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('block_id')->references('id')->on('exam_building_blocks')
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
        Schema::dropIfExists('exam_halls');
    }
}