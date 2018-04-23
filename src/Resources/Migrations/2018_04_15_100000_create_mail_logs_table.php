<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_mail_logs', function ($table) {
            $table->increments('id');
            $table->string('to');
            $table->string('to_name')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->boolean('sent');
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
        Schema::dropIfExists('ore_mail_logs');
    }
}
