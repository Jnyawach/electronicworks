<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorToPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('=payments', function (Blueprint $table) {
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
        Schema::table('payments', function (Blueprint $table) {
            //
            $table->bigInteger('authorized_by_id')->index()->unsigned();
            $table->bigInteger('withdraw_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }
}
