<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesciplineUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('descipline_user', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('descipline_user', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->index()->unsigned();
            $table->bigInteger('descipline_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('descipline_id')->references('id')->on('desciplines')
                ->onDelete('cascade');
        });
    }
}
