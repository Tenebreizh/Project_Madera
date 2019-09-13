<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranges', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('covering_id')->nullable();
            $table->integer('insulator_id')->nullable();
            $table->integer('external_finition_id')->nullable();
            $table->integer('window_frame_id')->nullable();
            $table->string('label', 64);
            $table->string('description', 64);
            $table->string('reference', 64);
            $table->text('rule');
            // $table->timestamps();

            $table->foreign('covering_id')->references('id')->on('coverings')->onDelete('set null');
            $table->foreign('insulator_id')->references('id')->on('insulators')->onDelete('set null');
            $table->foreign('external_finition_id')->references('id')->on('external_finitions')->onDelete('set null');
            $table->foreign('window_frame_id')->references('id')->on('window_frames')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranges');
    }
}
