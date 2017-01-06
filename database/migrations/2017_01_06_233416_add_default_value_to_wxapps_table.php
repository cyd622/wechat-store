<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueToWxappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wxapps', function(Blueprint $table) {

            $table->integer('status')->nullable()->default(1)->change();
            $table->integer('rating')->default(0)->change();
            $table->integer('likes')->default(0)->change();

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



        });
    }
}
