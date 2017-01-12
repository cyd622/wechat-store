<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_comments', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->index();
            $table->integer('post_id')->index();
            $table->string('ip')->index();
            $table->string('agent')->index();
            $table->integer('parent_id')->index();
            $table->text('content');

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
		Schema::drop('post_comments');
	}

}
