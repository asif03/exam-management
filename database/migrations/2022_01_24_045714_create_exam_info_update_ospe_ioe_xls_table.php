<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamInfoUpdateOspeIoeXlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_info_update_ospe_ioe_xls', function (Blueprint $table) {
            $table->year('exam_year');
            $table->enum('exam_session', ['JAN', 'JUL']);
            $table->string('roll_no', 6);
            $table->string('candidate_name', 255);
            $table->string('sp_code', 3);
            $table->unsignedBigInteger('batch_insert_no')->nullable();
            $table->timestamps();
            $table->primary(['exam_year', 'exam_session', 'roll_no', 'sp_code'], 'ospe_ioe_xl_primay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_info_update_ospe_ioe_xls');
    }
}