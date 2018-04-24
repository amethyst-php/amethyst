<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateActionEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_action_emails', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('mock_data');
            $table->text('targets');
            $table->string('subject');
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
        Schema::dropIfExists('ore_action_emails');
    }
}
