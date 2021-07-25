<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->bigInteger('citation_id')->index()->unsigned();
            $table->bigInteger('descipline_id')->index()->unsigned();
            $table->bigInteger('client_id')->index()->unsigned();
            $table->text('instruction');
            $table->integer('writer_id')->nullable();
            $table->dateTime('writer_delivery');
            $table->dateTime('client_delivery');
            $table->integer('words');
            $table->integer('cost');
            $table->string('slug');
            $table->foreign('citation_id')->references('id')->on('citations')->onDelete('cascade');
            $table->foreign('descipline_id')->references('id')->on('desciplines')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
