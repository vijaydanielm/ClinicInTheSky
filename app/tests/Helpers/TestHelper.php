<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 6:22 PM
 */

namespace Helpers;

use ClinicInTheSky\Person;
use ClinicInTheSky\PersonAddress;


class TestHelper {

    public static function createCompletePerson() {

        $person = new Person;
        $person->first_name = 'Vijay';
        $person->last_name = 'Daniel M';
        $person->date_of_birth = '1987-05-01';
        $person->gender = 'male';

        return $person;
    }

    public static function createAndSavePerson() {

        $person = static::createCompletePerson();
        $person->save();

        return $person;
    }

    public static function createCompleteAddress() {

        $address = new PersonAddress();
        $address->address_line1 = '15, Somewhere there';
        $address->address_line2 = 'Pluto';
        $address->address_line3 = 'Milky Way';
        $address->city = 'Erode';
        $address->state = 'Tamil Nadu';
        $address->country = 'India';
        $address->pincode = '638001';

        return $address;
    }

    public static function createCompleteAddressWithPerson() {

        $person = static::createAndSavePerson();

        $address = static::createCompleteAddress();
        $address->person_id = $person->id;

        return $address;
    }

} 