<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSourceInfoToWxappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wxapps', function(Blueprint $table) {

            $table->string('source')->nullable(true)->default('');
            $table->string('source_id')->nullable(true)->default('');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wxapps', function(Blueprint $table) {

            $table->dropColumn('source');
            $table->dropColumn('source_id');

        });
    }
}
