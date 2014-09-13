<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 12:29 PM
 */

namespace ClinicInTheSky;

use Faker\Factory;
use Helpers\TestHelper as T;
use TestCase;

class PersonTest extends TestCase {

    private $faker;

    public function __construct() {

        $this->faker = Factory::create();
    }

    public function setUp() {

        parent::setUp();
    }

    public function testSaveValidGenderMale() {

        $person = T::createCompletePerson();
        $person->gender = 'male';
        $this->assertSave($person);
    }


    public function testSaveValidGenderFemale() {

        $person = T::createCompletePerson();
        $person->gender = 'female';
        $this->assertSave($person);
    }

    public function testSaveValidGenderOther() {

        $person = T::createCompletePerson();
        $person->gender = 'other';
        $this->assertSave($person);
    }

    public function testSaveInvalidGender() {

        $person = T::createCompletePerson();
        $person->gender = 'invalidGender';
        $this->assertSaveFailure($person, 'gender');
    }

    public function testSaveNullGender() {

        $person = T::createCompletePerson();
        $person->gender = null;
        $this->assertSaveFailure($person, 'gender');
    }

    public function testSaveMissingFirstName() {

        $person = T::createCompletePerson();
        $person->first_name = null;
        $this->assertSaveFailure($person, 'first_name');
    }

    public function testSaveFirstNameWithLengthLessThanMinimum() {

        $person = T::createCompletePerson();
        $person->first_name = 'V';
        $this->assertSaveFailure($person, 'first_name');
    }

    public function testSaveFirstNameWithEmptyString() {

        $person = T::createCompletePerson();
        $person->first_name = '';
        $this->assertSaveFailure($person, 'first_name');
    }

    public function testSaveFirstNameWithLengthGreatherThanMaximum() {

        $person = T::createCompletePerson();
        $person->first_name = rtrim($this->faker->sentence(129), '.');
        $this->assertSaveFailure($person, 'first_name');
    }

    public function testSaveMissingLastName() {

        $person = T::createCompletePerson();
        $person->last_name = null;
        $this->assertSave($person);
    }

    public function testSaveLastNameWithEmptyString() {

        $person = T::createCompletePerson();
        $person->last_name = '';
        $this->assertSave($person);
    }

    public function testSaveLastNameWithLengthGreatherThanMaximum() {

        $person = T::createCompletePerson();
        $person->last_name = rtrim($this->faker->sentence(129), '.');
        $this->assertSaveFailure($person, 'last_name');
    }

    public function testSaveMissingDateOfBirth() {

        $person = T::createCompletePerson();
        $person->date_of_birth = null;
        $this->assertSaveFailure($person, 'date_of_birth');
    }

    public function testSaveWronglyFormattedDateOfBirth() {

        $person = T::createCompletePerson();
        $person->date_of_birth = '01/05/1987';
        $this->assertSaveFailure($person, 'date_of_birth');
    }

    public function testSaveDateOfBirthBeforeAllowedDate() {

        $person = T::createCompletePerson();
        $person->date_of_birth = '1800/10/1';
        $this->assertSaveFailure($person, 'date_of_birth', 2);
    }
}
 