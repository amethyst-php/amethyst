<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('action_emails',function($table) {
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
        Schema::dropIfExists('action_emails');
    }
}
