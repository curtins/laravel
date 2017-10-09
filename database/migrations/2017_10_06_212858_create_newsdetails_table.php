<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsdetails', function (Blueprint $table) {


           
            $table->increments('id');
            $table->integer('newsheader_id');
            $table->string('itemid');
            $table->string('published');
            $table->string('updated');
            $table->string('title');
            $table->text('summary');
            $table->string('content');
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
        Schema::dropIfExists('newsdetails');
    }
}
