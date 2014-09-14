<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonAddressesTable extends Migration {

    public function up() {

        Schema::create('person_addresses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('address_line1', 256);
            $table->string('address_line2', 256)->nullable();
            $table->string('address_line3', 256)->nullable();
            $table->string('landmark', 256)->nullable();
            $table->string('city', 256);
            $table->string('state', 256);
            $table->string('country', 256);
            $table->string('pincode', 256);
            $table->timestamps();

            $table->integer('person_id');
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
        });
    }

    public function down() {

        Schema::dropIfExists('person_addresses');
    }
}
