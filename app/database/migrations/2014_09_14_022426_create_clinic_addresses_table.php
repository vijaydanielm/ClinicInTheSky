<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicAddressesTable extends Migration {

    public function up() {

        Schema::create('clinic_addresses', function (Blueprint $table) {

            MigrationHelper::setUpAddressTable($table);

            $table->integer('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    public function down() {

        Schema::dropIfExists('clinic_addresses');
    }

}
