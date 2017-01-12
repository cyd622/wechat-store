<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title', 512);
            $table->string('name', 512);
            $table->text('content');
            $table->text('excerpt')->nullable(true);
            $table->enum('status', [1, 0])->default(1)->index();
            $table->enum('comment_status', [1, 0])->default(1);
            $table->integer('comment_count')->default(0);

            $table->string('source')->default('');
            $table->string('source_url', 512)->default('');
            $table->integer('source_id')->default(0);

            $table->timestamps();
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
