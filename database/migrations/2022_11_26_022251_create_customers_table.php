<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreing('user_id')->references('id')->on('users'); //llave foranea de la tabla usuarios
            $table->string('name');
            $table->string('last_name');
            $table->string('scnd_last_name');
            $table->string('address');
            $table->integer('phone');
            $table->integer('type_id'); // combo para el tipo de clientes
            $table->string('image')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
