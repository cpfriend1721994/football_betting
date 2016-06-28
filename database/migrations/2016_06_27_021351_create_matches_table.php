<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_team');
            $table->string('guest_team');
            $table->string('permision');
            $table->integer('home_score');
            $table->integer('guest_score');
            $table->integer('home_ratio');
            $table->integer('guest_ratio');
            $table->integer('tie_ratio');
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('end_time');
            $table->dateTimeTz('bed_time');
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
        Schema::drop('matches');
    }
}
