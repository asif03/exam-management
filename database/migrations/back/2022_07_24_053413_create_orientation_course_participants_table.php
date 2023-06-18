<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrientationCourseParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientation_course_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('bmdc_no', 10);
            $table->string('name', 50);
            $table->string('mobile', 20);
            $table->string('email', 50)->nullable();
            $table->string('address', 500)->nullable();
            $table->unsignedBigInteger('bank_id');
            $table->string('branch_name', 200)->nullable();
            $table->date('deposit_date')->nullable();
            $table->string('scroll_no', 50)->nullable();
            $table->decimal('fee', $precision = 15, $scale = 2)->default(0);
            $table->string('money_receipt_link', 500)->nullable();
            $table->string('image_link', 500)->nullable();
            $table->enum('payment_type', ['online', 'bank']);
            $table->enum('payment_status', ['init', 'success', 'failed']);
            $table->char('payment_varified', 1)->default('N');
            $table->boolean('active')->default(true);
            $table->foreign('course_id')->references('id')->on('orientation_course_params')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('orientation_course_banks')
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
        Schema::dropIfExists('orientation_course_participants');
    }
}