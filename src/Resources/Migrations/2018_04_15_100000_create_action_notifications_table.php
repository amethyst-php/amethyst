<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_action_notifications', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('mock_data');
            $table->longtext('template');
            $table->text('targets');
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
        Schema::dropIfExists('ore_action_notifications');
    }
}
