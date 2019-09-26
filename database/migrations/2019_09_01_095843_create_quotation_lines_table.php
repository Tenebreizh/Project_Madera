<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_lines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('custom_module_id');
            $table->integer('quotation_id');
            $table->integer('taxe_id');
            $table->string('name', 64);
            $table->string('description', 64);
            $table->float('price', 6, 2);
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('custom_module_id')->references('id')->on('custom_modules')->onDelete('cascade');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_lines');
    }
}
