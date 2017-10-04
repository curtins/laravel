<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JsonNewsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JsonNewsData', function (Blueprint $table) {
            $table->increments('id');
            $table->string('source');
            $table->string('http');
            $table->string('nextfetch');
            $table->string('title');
            $table->string('feed');
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
        Schema::drop('JsonNewData');
    }
}
