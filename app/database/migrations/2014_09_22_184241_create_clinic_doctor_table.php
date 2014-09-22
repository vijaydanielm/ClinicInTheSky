<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicDoctorTable extends Migration {

    public function up() {

        Schema::create('clinic_doctor', function (Blueprint $table) {

            $table->integer('clinic_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

            $table->index('clinic_id', 'clinic_doctor_clinic_index');
            $table->index('doctor_id', 'clinic_doctor_doctor_index');
            $table->index(['clinic_id', 'doctor_id'], 'clinic_doctor_index');
        });
    }

    public function down() {

        Schema::drop('clinic_doctor');
    }

}
