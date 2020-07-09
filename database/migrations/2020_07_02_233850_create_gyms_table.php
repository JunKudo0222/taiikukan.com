<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('area');
            $table->string('name');
            $table->time('openhour');
            $table->time('closehour');
            $table->integer('price');
            $table->integer('phonenumber');
            $table->string('email');
            $table->text('detail');
            $table->unsignedBigInteger('prefecture_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gyms');
    }
}
