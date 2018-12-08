<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('ip', 50)->nullable($value = false);
            $table->string('user_agent', 200)->nullable($value = false);

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_login_activities');
    }
}
