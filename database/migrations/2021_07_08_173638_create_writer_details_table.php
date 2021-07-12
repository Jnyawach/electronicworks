<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('gender');
            $table->string('language');
            $table->string('night_calls');
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('university');
            $table->string('department');
            $table->string('course');
            $table->integer('graduation');
            $table->integer('score')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('writer_details');
    }
}
