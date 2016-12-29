<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxappRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wxapp_ratings', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('wxapp_id')->index();
            $table->integer('user_id')->index();
            $table->double('rating');
            $table->double('comment');

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
        Schema::drop('wxapp_ratings');
    }
}
