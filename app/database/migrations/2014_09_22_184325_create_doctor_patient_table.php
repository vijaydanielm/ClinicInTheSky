<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorPatientTable extends Migration {

    public function up() {

        Schema::create('doctor_patient', function (Blueprint $table) {

            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

            $table->index('doctor_id', 'doctor_patient_doctor_index');
            $table->index('patient_id', 'doctor_patient_patient_index');
            $table->index(['doctor_id', 'patient_id'], 'doctor_patient_index');
        });
    }

    public function down() {

        Schema::drop('doctor_patient');
    }

}
