<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function(Blueprint $table){
            $table->increments('id');
            $table->string('name',255);
            $table->integer('amount');
            $table->integer('category_id')->nullable();
            //$table->foreign('category_id')->references('id')->('categories');
           
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
