<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration {

    public function up() {

        Schema::create('clinics', function (Blueprint $table) {

            $table->increments('id');

        });
    }

    public function down() {

        Schema::dropIfExists('clinics');
    }

}
