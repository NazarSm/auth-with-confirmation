<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('agent_id')->unsigned()->nullable();

            $table->string('name');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('company_name');
            $table->bigInteger('siret_number');
            $table->string('address');
            $table->string('post_code')->nullable();
            $table->enum('gender',['Ms', 'Mrs']);
            $table->string('first_name');
            $table->date('contract_signature_date')->nullable();
            $table->integer('total_transactions')->nullable();
            $table->text('logo')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('agent_id')->references('id')->on('agents');
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
        Schema::dropIfExists('clients');
    }
}
