<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ConfideSetupUsersTable extends Migration {

    public function up() {

        Schema::create('user_accounts', function (Blueprint $table) {

            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });

        Schema::create('password_reminders', function (Blueprint $table) {

            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
    }

    public function down() {

        Schema::drop('password_reminders');
        Schema::drop('user_accounts');
    }
}
