<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('problem.table_name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status_code');
            $table->string('method');
            $table->text('filename');
            $table->text('line')->nullable();
            $table->string('hit')->default(0);
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('problem.table_name'));
    }
}