<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('area_id')->unsigned();
            $table->string('name');
            $table->double('price');
            $table->text('description');
            $table->integer('category_id')->unsigned();
            $table->boolean('enable')->default(true);
            $table->string('image');
            $table->timestamps();

           /*  $table->foreign('area_id')->references('id')->on('areas'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
