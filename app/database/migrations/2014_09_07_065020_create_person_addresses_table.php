<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonAddressesTable extends Migration {

    public function up() {

        Schema::create('person_addresses', function (Blueprint $table) {

            MigrationHelper::setUpAddressTable($table);

            $table->integer('person_id');
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
        });
    }

    public function down() {

        Schema::dropIfExists('person_addresses');
    }
}
