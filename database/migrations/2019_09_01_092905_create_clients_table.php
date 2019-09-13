<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('id', true);
            $table->integer('city_id')->nullable();
            $table->string('firstname', 64);
            $table->string('lastname', 64);
            $table->string('street', 64);
            $table->string('street_number', 5);
            $table->string('zipcode', 10);
            // $table->string('country', 64); Répétition avec fk city_id
            // $table->string('city', 64);
            $table->string('email');
            $table->string('phone', 15);
            $table->timestamps();

            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
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
