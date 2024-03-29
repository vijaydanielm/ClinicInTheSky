<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonsTable extends Migration {

    public function up() {

        Schema::create('persons', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name', 128);
            $table->string('last_name', 128)->nullable();
            $table->string('gender', 16);
            $table->date('date_of_birth');
            $table->morphs('personable');
            $table->timestamps();

            $table->index(['first_name', 'last_name'], 'name_index');
            $table->index(['personable_type', 'personable_id'], 'persons_personable_index');
            $table->unique(['personable_type', 'personable_id'], 'persons_personable_unique_index');
        });
    }

    public function down() {

        Schema::drop('persons');
    }
}
