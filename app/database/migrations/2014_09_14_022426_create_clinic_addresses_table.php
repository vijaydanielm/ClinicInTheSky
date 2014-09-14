<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicAddressesTable extends Migration {

    public function up() {

        Schema::create('clinic_addresses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 256);
        });
    }

    public function down() {

        Schema::dropIfExists('clinic_addresses');
    }

}
