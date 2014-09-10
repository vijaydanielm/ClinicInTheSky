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

        $result = $person->save();
        $this->assertTrue($result);
    }


    public function testSaveValidGenderFemale() {

        $person = T::createCompletePerson();
        $person->gender = 'female';

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveValidGenderOther() {

        $person = T::createCompletePerson();
        $person->gender = 'other';

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveInvalidGender() {

        $person = T::createCompletePerson();
        $person->gender = 'invalidGender';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'gender');
    }

    public function testSaveNullGender() {

        $person = T::createCompletePerson();
        $person->gender = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'gender');
    }

    public function testSaveMissingFirstName() {

        $person = T::createCompletePerson();
        $person->first_name = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveFirstNameWithLengthLessThanMinimum() {

        $person = T::createCompletePerson();
        $person->first_name = 'V';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveFirstNameWithEmptyString() {

        $person = T::createCompletePerson();
        $person->first_name = '';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveFirstNameWithLengthGreatherThanMaximum() {

        $person = T::createCompletePerson();
        $person->first_name = rtrim($this->faker->sentence(129), '.');

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'first_name');
    }

    public function testSaveMissingLastName() {

        $person = T::createCompletePerson();
        $person->last_name = null;

        $result = $person->save();
        $this->assertTrue($result);
    }

    public function testSaveLastNameWithEmptyString() {

        $person = T::createCompletePerson();
        $person->last_name = '';

        $result = $person->save();
        $this->assertTrue($result);

        var_dump('testSaveLastNameWithEmptyString');
        var_dump($person);
        var_dump(Person::find(1));
    }

    public function testSaveLastNameWithLengthGreatherThanMaximum() {

        $person = T::createCompletePerson();
        $person->last_name = rtrim($this->faker->sentence(129), '.');

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'last_name');
    }

    public function testSaveMissingDateOfBirth() {

        $person = T::createCompletePerson();
        $person->date_of_birth = null;

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'date_of_birth');
    }

    public function testSaveWronglyFormattedDateOfBirth() {

        $person = T::createCompletePerson();
        $person->date_of_birth = '01/05/1987';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'date_of_birth');
    }

    public function testSaveDateOfBirthBeforeAllowedDate() {

        $person = T::createCompletePerson();
        $person->date_of_birth = '1800/10/1';

        $result = $person->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($person->validationErrors, 'date_of_birth', 2);
    }
}
 