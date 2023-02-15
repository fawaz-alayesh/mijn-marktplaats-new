<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertenties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('filename');
            $table->string('title');
            $table->string('city');
            $table->string('state');
            $table->longText('description');
            $table->integer('price');
            $table->string('category');
            $table->string('lat');
            $table->string('lng');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertenties');
    }
};
