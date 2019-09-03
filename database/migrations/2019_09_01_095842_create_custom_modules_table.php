<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_modules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('module_id');
            $table->string('label', 64);
            $table->string('description', 64);
            $table->text('specification');
            $table->float('price', 6, 2);
            $table->float('commercial_marge', 5, 2);
            // $table->timestamps();

            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_modules');
    }
}
