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

class PersonAddressTest extends TestCase {

    private $faker;

    public function setUp() {

        parent::setUp();

        $this->faker = Factory::create();
    }

    public function testSaveCompleteAddress() {

        $address = T::createCompleteAddressWithPerson();
        $result = $address->save();
        $this->assertTrue($result);
    }

    public function testSaveNullAddressLine1() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = null;
        $result = $address->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($address->validationErrors, 'address_line1');
    }

    public function testSaveEmptyAddressLine1() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = '';
        $result = $address->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($address->validationErrors, 'address_line1');
    }

    public function testSaveAddressLine1LessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = '12';
        $result = $address->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($address->validationErrors, 'address_line1');
    }

    public function testSaveAddressLine1GreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = rtrim($this->faker->sentence(257), ',');
        $result = $address->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($address->validationErrors, 'address_line1');
    }

    public function testSaveEmptyAddressLine2() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = '';
        $result = $address->save();
        $this->assertTrue($result);
    }

    public function testSaveAddressLine2LessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = '12';
        $result = $address->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($address->validationErrors, 'address_line2');
    }

    public function testSaveAddressLine2GreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = rtrim($this->faker->sentence(257), ',');
        $result = $address->save();
        $this->assertFalse($result);
        $this->assertErrorForFieldOnly($address->validationErrors, 'address_line2');
    }
}
 