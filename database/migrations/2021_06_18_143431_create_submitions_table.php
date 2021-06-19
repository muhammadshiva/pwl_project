<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_student');
            $table->string('title');
            $table->string('file');
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('id_assigment')->nullable();
            $table->timestamps();
            $table->foreign('id_assigment')->references('id')->on('tugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitions');
    }
}
