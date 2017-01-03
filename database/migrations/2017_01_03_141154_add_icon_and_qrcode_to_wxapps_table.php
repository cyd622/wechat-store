<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconAndQrcodeToWxappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wxapps', function(Blueprint $table) {

            $table->string('qrcode')->nullable();
            $table->string('icon')->nullable();

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

            $table->dropColumn('qrcode');
            $table->dropColumn('icon');

        });
    }
}
