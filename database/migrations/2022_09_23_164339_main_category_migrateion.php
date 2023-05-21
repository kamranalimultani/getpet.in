<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MainCategoryMigrateion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('ultraCat');
            $table->string('main_cat_paragraph')->nullable();
            $table->string('main_cat_name');
            $table->string('main_cat_small_image')->nullable();
            $table->string('main_cat_banner_image')->nullable();
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
