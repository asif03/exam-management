<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFellowsPgsqlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellows_pgsql', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('fellow_id')->unique();
            $table->string('fellow_name', 255);
            $table->unsignedBigInteger('fellow_type_id')->nullable();
            $table->tinyInteger('subject_id_pgsql')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->date('fellowship_date')->nullable();
            $table->year('fellowship_year')->nullable();
            $table->enum('fellowship_session', ['JAN', 'JUL'])->nullable();
            $table->string('home_address', 255)->nullable();
            $table->string('office_address', 500)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->string('phone_home', 100)->nullable();
            $table->string('phone_office', 100)->nullable();
            $table->string('pin_no', 20)->nullable();
            $table->string('sp_code', 10)->nullable();
            $table->unsignedBigInteger('institute_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->string('fax', 55)->nullable();
            $table->char('lifetime', 1)->default('N');
            $table->char('retired', 1)->default('N');
            $table->char('deceased', 1)->default('N');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('fellow_type_id')->references('id')->on('fellowship_statuses')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('institute_id')->references('id')->on('designations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('institutes')
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
        Schema::dropIfExists('fellows_pgsql');
    }
}
