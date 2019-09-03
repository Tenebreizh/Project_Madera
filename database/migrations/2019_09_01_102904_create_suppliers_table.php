<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('firstname', 64);
            $table->string('lastname', 64);
            $table->string('street', 64);
            $table->string('street_number', 5);
            $table->string('zipcode', 10);
            $table->string('city', 64);
            $table->string('country', 64);
            $table->string('phone', 15);
            $table->string('fax', 15);
            $table->string('email');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
