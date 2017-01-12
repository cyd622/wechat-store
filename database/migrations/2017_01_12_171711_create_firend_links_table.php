<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirendLinksTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_links', function(Blueprint $table) {

            $table->increments('id');
            $table->enum('show_on_index', ['yes', 'no'])->index()->default('no');
            $table->enum('ignore', ['yes', 'no'])->default('no');
            $table->string('title');
            $table->string('url', 512);
            $table->enum('status', [0, 1])->default(1)->index();
            $table->integer('baidu_rank')->default(0);
            $table->integer('sougou_rank')->default(0);

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
        Schema::drop('friend_links');
    }
}
