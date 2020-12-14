<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token', 16)->unique();
            $table->integer('user_id')->unsigned();
            $table->string('first_name');
            $table->string('surname');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('post_code')->nullable();
            $table->enum('gender',['Ms', 'Mrs']);

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('agents');
    }
}
