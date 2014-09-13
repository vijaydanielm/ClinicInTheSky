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

    public function testSaveCompleteAddress() {

        $address = T::createCompleteAddressWithPerson();
        $this->assertSave($address);
    }

    public function testSaveNullAddressLine1() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = null;
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveEmptyAddressLine1() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = '';
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveAddressLine1LessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = '12';
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveAddressLine1GreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line1 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveNullAddressLine2() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = null;
        $this->assertSave($address);
    }

    public function testSaveEmptyAddressLine2() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = '';
        $this->assertSave($address);
    }

    public function testSaveAddressLine2LessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = '12';
        $this->assertSaveFailure($address, 'address_line2');
    }

    public function testSaveAddressLine2GreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line2 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'address_line2');
    }

    public function testSaveNullAddressLine3() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line3 = null;
        $this->assertSave($address);
    }

    public function testSaveEmptyAddressLine3() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line3 = '';
        $this->assertSave($address);
    }

    public function testSaveAddressLine3LessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line3 = '12';
        $this->assertSaveFailure($address, 'address_line3');
    }

    public function testSaveAddressLine3GreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->address_line3 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'address_line3');
    }

    public function testSaveNullLandmark() {

        $address = T::createCompleteAddressWithPerson();
        $address->landmark = null;
        $this->assertSave($address);
    }

    public function testSaveEmptyLandmark() {

        $address = T::createCompleteAddressWithPerson();
        $address->landmark = '';
        $this->assertSave($address);
    }

    public function testSaveLandmarkLessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->landmark = '1';
        $this->assertSaveFailure($address, 'landmark');
    }

    public function testSaveLandmarkGreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->landmark = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'landmark');
    }

    public function testSaveNullCity() {

        $address = T::createCompleteAddressWithPerson();
        $address->city = null;
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveEmptyCity() {

        $address = T::createCompleteAddressWithPerson();
        $address->city = '';
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveCityLessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->city = '1';
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveCityGreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->city = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveNullState() {

        $address = T::createCompleteAddressWithPerson();
        $address->state = null;
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveEmptyState() {

        $address = T::createCompleteAddressWithPerson();
        $address->state = '';
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveStateLessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->state = '1';
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveStateGreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->state = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveNullCountry() {

        $address = T::createCompleteAddressWithPerson();
        $address->country = null;
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveEmptyCountry() {

        $address = T::createCompleteAddressWithPerson();
        $address->country = '';
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveCountryLessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->country = '1';
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveCountryGreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->country = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveNullPincode() {

        $address = T::createCompleteAddressWithPerson();
        $address->pincode = null;
        $this->assertSaveFailure($address, 'pincode');
    }

    public function testSaveEmptyPincode() {

        $address = T::createCompleteAddressWithPerson();
        $address->pincode = '';
        $this->assertSaveFailure($address, 'pincode');
    }

    public function testSavePincodeLessThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->pincode = '1';
        $this->assertSaveFailure($address, 'pincode');
    }

    public function testSavePincodeGreaterThanMinimumSize() {

        $address = T::createCompleteAddressWithPerson();
        $address->pincode = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'pincode');
    }
}
 