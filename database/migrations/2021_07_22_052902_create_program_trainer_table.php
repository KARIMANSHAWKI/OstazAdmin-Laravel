<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_trainer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('program_id');
            $table->unsignedInteger('trainer_id');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_trainer');
    }
}
