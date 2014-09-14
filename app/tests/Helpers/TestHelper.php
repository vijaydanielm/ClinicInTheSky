<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 6:22 PM
 */

namespace Helpers;

use ClinicInTheSky\Clinic;
use ClinicInTheSky\Person;
use ClinicInTheSky\PersonAddress;
use ClinicInTheSky\ClinicAddress;
use LaravelBook\Ardent\Ardent;


class TestHelper {

    public static function createCompletePerson() {

        $person = new Person();
        $person->first_name = 'Vijay';
        $person->last_name = 'Daniel M';
        $person->date_of_birth = '1987-05-01';
        $person->gender = 'male';

        return $person;
    }

    public static function createCompleteClinic() {

        $clinic = new Clinic();
        $clinic->name = 'Burs n Chisels Clinic';

        return $clinic;
    }

    public static function createAndSaveClinic() {

        $clinic = static::createCompleteClinic();
        $clinic->save();

        return $clinic;
    }

    public static function createCompleteAddressWithClinic() {

        $clinic = static::createAndSaveClinic();

        $address = static::createCompleteClinicAddress();
        $address->clinic_id = $clinic->id;

        return $address;
    }

    public static function createAndSavePerson() {

        $person = static::createCompletePerson();
        $person->save();

        return $person;
    }

    private static function populateCompleteAddress(Ardent $address) {

        $address->address_line1 = '15, Somewhere there';
        $address->address_line2 = 'Pluto';
        $address->address_line3 = 'Milky Way';
        $address->city = 'Erode';
        $address->state = 'Tamil Nadu';
        $address->country = 'India';
        $address->pincode = '638001';

        return $address;
    }

    public static function createCompleteClinicAddress() {

        return static::populateCompleteAddress(new ClinicAddress());
    }

    public static function createCompletePersonAddress() {

        return static::populateCompleteAddress(new PersonAddress());
    }

    public static function createCompleteAddressWithPerson() {

        $person = static::createAndSavePerson();

        $address = static::createCompletePersonAddress();
        $address->person_id = $person->id;

        return $address;
    }

} 