<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPendingEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_users_pending_emails', function ($table) {
            $table->increments('id');
            $table->string('token');
            $table->string('email');
            $table->integer('user_id')->unsigned();
            $table->timestamp('notified_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('ore_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ore_users_pending_emails');
    }
}
