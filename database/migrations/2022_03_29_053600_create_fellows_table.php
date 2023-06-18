<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFellowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fellowship_status_id');
            $table->year('fellowship_year')->nullable();
            $table->string('fellowship_session', 3)->nullable();
            $table->string('fellow_id', 20)->nullable();
            $table->string('name', 255);
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('office_add', 255)->nullable();
            $table->string('home_add', 255)->nullable();
            $table->string('office_tel', 30)->nullable();
            $table->string('home_tel', 30)->nullable();
            $table->string('mobile', 80)->nullable();
            $table->string('e_mail', 80)->nullable();
            $table->string('fellowship_date', 35);
            $table->unsignedBigInteger('institute_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->string('sub', 55)->nullable();
            $table->string('desg', 255)->nullable();
            $table->string('inst', 255)->nullable();
            $table->string('remarks', 500)->nullable();
            $table->boolean('deceased')->default(false);
            $table->boolean('lifetime_member')->default(false);
            $table->boolean('abroad')->default(false);
            $table->string('pnr_no', 15)->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('fellowship_status_id')->references('id')->on('fellowship_statuses')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('institute_id')->references('id')->on('institutes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')
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
        Schema::dropIfExists('fellows');
    }
}