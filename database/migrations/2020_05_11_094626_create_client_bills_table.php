<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('client_lastname');
            $table->string('client_username');
            $table->string('ordered');
            $table->double('total_Order');
            $table->string('hotel_account');
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
        Schema::dropIfExists('client_bills');
    }
}
