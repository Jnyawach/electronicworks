<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestItToessay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('essay_writings', function (Blueprint $table) {
            //
            $table->bigInteger('essay_id')->index()->unsigned();
            $table->foreign('essay_id')->references('id')->on('essays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('essay_writings', function (Blueprint $table) {
            //
        });
    }
}
