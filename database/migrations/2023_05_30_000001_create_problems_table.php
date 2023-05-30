<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// class CreateProblemAlertTable extends Migration
return new class extends Migration
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
            $table->text('url');
            $table->text('filename')->nullable();
            $table->string('line')->nullable();
            $table->string('exception');
            $table->string('hit')->default(1);
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
};