<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

    public function up() {

        Schema::create('patients', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('patients');
    }

}
