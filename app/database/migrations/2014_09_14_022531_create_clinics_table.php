<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration {

    public function up() {

        Schema::create('clinics', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 256);
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('clinics');
    }

}
