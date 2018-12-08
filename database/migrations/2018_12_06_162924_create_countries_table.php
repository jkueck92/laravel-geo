<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('name', 100)->nullable($value = false);
            $table->string('alpha2', 2)->nullable($value = false);
            $table->string('alpha3', 3)->nullable($value = false);
            $table->string('alphaNumeric', 3)->nullable($value = false);

            $table->unsignedInteger('continent_id');
            $table->foreign('continent_id')->references('id')->on('continents')->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
