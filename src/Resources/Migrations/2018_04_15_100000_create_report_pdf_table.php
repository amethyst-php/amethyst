<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateReportPdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_report_pdf', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->text('mock_data');
            $table->longtext('template');
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
        Schema::dropIfExists('ore_report_pdf');
    }
}
