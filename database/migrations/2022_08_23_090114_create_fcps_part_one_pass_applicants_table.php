<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcpsPartOnePassApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcps_part_one_pass_applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_one_pass_id');
            $table->enum('payment_type', ['CASH', 'BANK', 'ONLINE']);
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('branch_name', 255)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('transaction_id')->nullable()->comment('money receipt no.');
            $table->decimal('fee', $precision = 15, $scale = 2)->default(0);
            $table->enum('payment_status', ['INIT', 'SUCCESS', 'FAILED'])->default('INIT');
            $table->char('verified', 1)->default('N');
            $table->timestamps();
            $table->foreign('part_one_pass_id')->references('id')->on('fcps_part_one_pass_students')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')
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
        Schema::dropIfExists('fcps_part_one_pass_applicants');
    }
}