<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('username',20)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('num_target')->nullable();
            $table->string('hotel_account')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->integer('historic_id')->unsigned();
            $table->foreign('historic_id')->references('id')->on('historics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
