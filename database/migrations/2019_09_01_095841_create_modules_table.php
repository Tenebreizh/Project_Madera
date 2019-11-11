<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('range_id');
            $table->string('name', 64);
            $table->string('description', 64);
            $table->string('principal_cut', 64);
            $table->string('cctp', 128);
            $table->float('marge', 5, 2);
            $table->time('labor_time');
            $table->float('price', 6, 2);
            $table->float('marge_enterprise', 5, 2);
            $table->timestamps();

            $table->foreign('range_id')->references('id')->on('ranges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
