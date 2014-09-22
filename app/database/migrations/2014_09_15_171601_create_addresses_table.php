<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

    public function up() {

        Schema::create('addresses', function (Blueprint $table) {

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

            $table->integer('addressable_id');
            $table->string('addressable_type', 512);
        });
    }

    public function down() {

        Schema::dropIfExists('addresses');
    }

}
