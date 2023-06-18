<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBcpsGoldenJubileeGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bcps_golden_jubilee_guests', function (Blueprint $table) {
            $table->id();
            $table->string('mem_fellow_radio', 5);
            $table->string('fellow_id', 15);
            $table->unsignedBigInteger('subject_id');
            $table->string('profession', 15);
            $table->string('gender', 15);
            $table->string('candidate_name', 255);
            $table->string('institute', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->string('mailing_addr', 255)->nullable();
            $table->string('mobile', 15);
            $table->string('email', 255)->nullable();
            $table->boolean('is_spouse_chk')->default(false);
            $table->string('spouse_name', 255)->nullable();
            $table->string('spouse_mobile', 15)->nullable();
            $table->string('payment_mode', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('bank_branch', 255);
            $table->decimal('reg_fee', 5, 2)->default(0);
            $table->char('verified', 1)->default('N');
            $table->string('money_receipt', 55);
            $table->string('money_rec_file', 500)->nullable();
            $table->string('img_up_file', 500)->nullable();
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
        Schema::dropIfExists('bcps_golden_jubilee_guests');
    }
}