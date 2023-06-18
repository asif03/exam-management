<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtmdTrainingWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtmd_training_workshops', function (Blueprint $table) {
            $table->id();
            $table->string('mem_fellow_radio', 5)->nullable();
            $table->string('fellow_id', 15);
            $table->unsignedBigInteger('subject_id');
            $table->string('profession', 15)->nullable();
            $table->string('gender', 15)->nullable();
            $table->string('candidate_name', 255);
            $table->string('institute', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->string('mailing_addr', 255)->nullable();
            $table->string('mobile', 15);
            $table->string('email', 255)->nullable();
            $table->string('payment_mode', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('bank_branch', 255)->nullable();
            $table->decimal('reg_fee', 5, 2)->default(0);
            $table->char('verified', 1)->default('N');
            $table->string('money_receipt', 55);
            $table->string('money_rec_file', 500)->nullable();
            $table->string('img_up_file', 500)->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('rtmd_training_workshops');
    }
}