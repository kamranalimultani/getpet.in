<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('p_id');
            $table->string('p_cat_id');
            $table->string('p_name');
            $table->string('p_description')->nullable();
            $table->string('p_main_image');
            $table->string('p_price');
            $table->string('p_seller_city')->nullable();
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
        //
    }
}
