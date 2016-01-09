<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mcid_id');
            $table->string('url');
            $table->timestamps();

            $table->foreign('mcid_id')->references('id')->on('mcids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('capes');
    }
}
