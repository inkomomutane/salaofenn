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
            $table->id();
            $table->foreignId('sub_category_id');
            $table->foreignId('fornecedor_id');
            $table->string('name');
            $table->text('description');
            $table->text('image');
            $table->text('video');
            $table->double('price');
            $table->boolean('sellable');
            $table->timestamp('published_at');
            $table->double('promotion');
            $table->integer('quantity');
            $table->integer('actual_stock');
            $table->integer('reserved_stock');
            $table->integer('free_stock');
            $table->integer('max_stock');
            $table->integer('min_stock');
            $table->double('imposto');
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