<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('project_id')->unsigned()->index();
            $table->string('amount');
            $table->integer('status')->default(0);
            $table->text('reason');
            $table->text('reject_reason')->nullable();
            $table->foreign('project_id')->references('id')
                ->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
