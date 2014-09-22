<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration {

    public function up() {

        Schema::create('doctors', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_account_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_account_id')->references('id')->on('user_accounts');
        });
    }

    public function down() {

        Schema::dropIfExists('doctors');
    }

}
