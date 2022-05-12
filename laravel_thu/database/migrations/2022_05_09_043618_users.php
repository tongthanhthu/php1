<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_address',255);
            $table->string('password',255);
            $table->string('name',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',15)->nullable();
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->softDeletes();
            $table->rememberToken();

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
