<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateHttpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_http_logs', function ($table) {
            $table->increments('id');
            $table->string('type');
            $table->string('url');
            $table->string('category');
            $table->string('method');
            $table->string('ip');
            $table->longtext('request');
            $table->longtext('response');
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
        Schema::dropIfExists('ore_http_logs');
    }
}
