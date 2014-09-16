<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 6:22 PM
 */

namespace Helpers;

use ClinicInTheSky\Address;
use ClinicInTheSky\Clinic;
use ClinicInTheSky\Person;


class TestHelper {

    /**
     * @return Person
     */
    public static function createCompletePerson() {

        $person = new Person();
        $person->first_name = 'Vijay';
        $person->last_name = 'Daniel M';
        $person->date_of_birth = '1987-05-01';
        $person->gender = 'male';

        return $person;
    }

    /**
     * @return Clinic
     */
    public static function createCompleteClinic() {

        $clinic = new Clinic();
        $clinic->name = 'Burs n Chisels Clinic';

        return $clinic;
    }

    /**
     * @return Clinic
     */
    public static function createAndSaveClinic() {

        $clinic = static::createCompleteClinic();
        assert('$clinic->save()', 'Saving clinicfailed');

        return $clinic;
    }

    public static function createAndSaveAddressable() {

        return static::createAndSavePerson();
    }

    /**
     * @return Person
     */
    public static function createAndSavePerson() {

        $person = static::createCompletePerson();
        assert('$person->save()', 'Saving person failed');

        return $person;
    }

    /**
     * @return Address
     */
    public static function createCompleteAddress() {

        $address = new Address();
        $address->address_line1 = '15, Somewhere there';
        $address->address_line2 = 'Pluto';
        $address->address_line3 = 'Milky Way';
        $address->city = 'Erode';
        $address->state = 'Tamil Nadu';
        $address->country = 'India';
        $address->pincode = '638001';

        return $address;
    }

    /**
     * @return Address
     */
    public static function createAndSaveAddress() {

        $addressable = static::createAndSaveAddressable();
        $address = static::createCompleteAddress();
        $addressable->address()->save($address);

        return $addressable->address;
    }
}