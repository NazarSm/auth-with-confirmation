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
            $table->string('token', 20)->unique();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('post_code')->nullable();
            $table->enum('gender',['Ms', 'Mrs']);
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('birth_city');
            $table->string('company_name');
            $table->string('bank_name');
            $table->string('iban');
            $table->string('bank_code');


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
