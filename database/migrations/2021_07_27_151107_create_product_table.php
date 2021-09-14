<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); //Crea un campo autoincrementable como entero sin signo, con el nombre id
            $table->string('name',50);
            $table->double('cost',10,2);
            $table->double('price',10,2);
            $table->integer('quantity');
            $table->foreignId('brand_id');
            $table->timestamps(); //created_at , updated_at

            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
