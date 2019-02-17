<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // for making changes to database
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //increment the primary key in the id field
            $table->string('email')->unique(); //create a string field called email that must be unique
            $table->string('password')->nullable(false); //create a string field called password that cannot be equal to null
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //for rolling back database changes
    {
        Schema::dropIfExists('users');
    }
}
