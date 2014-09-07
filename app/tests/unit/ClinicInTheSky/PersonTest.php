<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 12:29 PM
 */

namespace ClinicInTheSky;

use Faker\Factory;
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

        $person = $this->createCompletePerson();
        $person->gender = 'male';

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveValidGenderFemale() {

        $person = $this->createCompletePerson();
        $person->gender = 'female';

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveValidGenderOther() {

        $person = $this->createCompletePerson();
        $person->gender = 'other';

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveInvalidGender() {

        $person = $this->createCompletePerson();
        $person->gender = 'invalidGender';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'gender');
    }

    public function testSaveNullGender() {

        $person = $this->createCompletePerson();
        $person->gender = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'gender');
    }

    public function testSaveMissingFirstName() {

        $person = $this->createCompletePerson();
        $person->first_name = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveFirstNameWithLengthLessThanMinimum() {

        $person = $this->createCompletePerson();
        $person->first_name = 'V';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveFirstNameWithEmptyString() {

        $person = $this->createCompletePerson();
        $person->first_name = '';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveFirstNameWithLengthGreatherThanMaximum() {

        $person = $this->createCompletePerson();
        $person->first_name = rtrim($this->faker->sentence(129), '.');

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveMissingLastName() {

        $person = $this->createCompletePerson();
        $person->last_name = null;

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveLastNameWithEmptyString() {

        $person = $this->createCompletePerson();
        $person->last_name = '';

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveLastNameWithLengthGreatherThanMaximum() {

        $person = $this->createCompletePerson();
        $person->last_name = rtrim($this->faker->sentence(129), '.');

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'last_name');
    }

    public function testSaveMissingDateOfBirth() {

        $person = $this->createCompletePerson();
        $person->date_of_birth = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'date_of_birth');
    }

    public function testSaveWronglyFormattedDateOfBirth() {

        $person = $this->createCompletePerson();
        $person->date_of_birth = '01/05/1987';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'date_of_birth');
    }

    public function testSaveDateOfBirthBeforeAllowedDate() {

        $person = $this->createCompletePerson();
        $person->date_of_birth = '1800/10/1';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'date_of_birth', 2);
    }

    public function testSaveWithoutAddress() {

        $person = $this->createCompletePerson();
        $person->address = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'address');
    }

    private function createCompletePerson() {

        $person = new Person;
        $person->first_name = 'Vijay';
        $person->last_name = 'Daniel M';
        $person->date_of_birth = '1987-05-01';
        $person->gender = 'female';
        $person->address = new PersonAddress();
        $person->address->address_line1 = '15, Somewhere there';
        $person->address->address_line2 = 'Pluto';
        $person->address->address_line3 = 'Milky Way';
        $person->address->city = 'Erode';
        $person->address->state = 'Tamil Nadu';
        $person->address->country = 'India';
        $person->address->pincode = '638001';

        return $person;
    }

    private function assertErrorForFieldOnly($messageBag, $field, $fieldErrorCount = 1) {

        var_dump($messageBag);
        $this->assertEquals($fieldErrorCount, $messageBag->count(), 'Mismatch in expected error count');
        $this->assertEquals($fieldErrorCount, count($messageBag->get($field)), "Mismatch in expected error count for $field field");
    }
}
 