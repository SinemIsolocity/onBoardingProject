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
        // 1. Missing "->sofdeletes()"
        
        // 2. There may be nullable (->nullable) fields such as "description"
        
        // 3. There may be default values such as "cost" ( ->default(0) )
        
        
        // NOTE: No need to fix all this, most of it looks good. It is just for you to keep in mind once working on Isolocity project
        
        
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('identification')->unique();
            $table->integer('batch_number');
            $table->integer('quantity');
            $table->decimal('price');
            $table->decimal('cost');
            $table->integer('reorder_point');
            $table->boolean('active');
            $table->text('description');
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
