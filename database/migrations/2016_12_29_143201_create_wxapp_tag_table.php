<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxappTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wxapp_tag', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('wxapp_id')->index();
            $table->integer('tag_id')->index();

            $table->index(['wxapp_id', 'tag_id']);
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
        Schema::drop('wxapp_tag');
    }
}
