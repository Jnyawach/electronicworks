<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_trackers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->integer('quantity');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_trackers');
    }
}
