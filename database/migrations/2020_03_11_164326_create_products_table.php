<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->text('description');
            $table->integer('quantity')->default(0);
            $table->integer('price');
            $table->integer('promotion')->default(0)->nullable();
            $table->string('img_name');
            $table->string('img_path');
            $table->tinyInteger('hot')->default(0);
            $table->integer('idProductType')->unsigned();
            $table->foreign('idProductType')->references('id')->on('product_types')->onDelete('cascade');
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
