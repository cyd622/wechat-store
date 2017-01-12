<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('posts', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->index();
            $table->string('title', 512)->index();
            $table->string('name', 512)->index();
            $table->text('content')->index();
            $table->text('excerpt')->nullable(true);
            $table->enum('status', [1, 0])->default(1)->index();
            $table->enum('comment_status', [1, 0])->default(1)->index();
            $table->enum('comment_status', [1, 0])->default(1)->index();
            $table->integer('comment_count')->default(0);

            $table->timestamp();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
