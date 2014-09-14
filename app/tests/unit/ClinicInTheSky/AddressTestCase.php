<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 12:29 PM
 */

namespace ClinicInTheSky;

use TestCase;

abstract class AddressTestCase extends TestCase {

    abstract protected function getCompleteAddress();

    public function testSaveCompleteAddress() {

        $address = $this->getCompleteAddress();
        $this->assertSave($address);
    }

    public function testSaveNullAddressLine1() {

        $address = $this->getCompleteAddress();
        $address->address_line1 = null;
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveEmptyAddressLine1() {

        $address = $this->getCompleteAddress();
        $address->address_line1 = '';
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveAddressLine1LessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->address_line1 = '12';
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveAddressLine1GreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->address_line1 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'address_line1');
    }

    public function testSaveNullAddressLine2() {

        $address = $this->getCompleteAddress();
        $address->address_line2 = null;
        $this->assertSave($address);
    }

    public function testSaveEmptyAddressLine2() {

        $address = $this->getCompleteAddress();
        $address->address_line2 = '';
        $this->assertSave($address);
    }

    public function testSaveAddressLine2LessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->address_line2 = '12';
        $this->assertSaveFailure($address, 'address_line2');
    }

    public function testSaveAddressLine2GreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->address_line2 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'address_line2');
    }

    public function testSaveNullAddressLine3() {

        $address = $this->getCompleteAddress();
        $address->address_line3 = null;
        $this->assertSave($address);
    }

    public function testSaveEmptyAddressLine3() {

        $address = $this->getCompleteAddress();
        $address->address_line3 = '';
        $this->assertSave($address);
    }

    public function testSaveAddressLine3LessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->address_line3 = '12';
        $this->assertSaveFailure($address, 'address_line3');
    }

    public function testSaveAddressLine3GreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->address_line3 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'address_line3');
    }

    public function testSaveNullLandmark() {

        $address = $this->getCompleteAddress();
        $address->landmark = null;
        $this->assertSave($address);
    }

    public function testSaveEmptyLandmark() {

        $address = $this->getCompleteAddress();
        $address->landmark = '';
        $this->assertSave($address);
    }

    public function testSaveLandmarkLessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->landmark = '1';
        $this->assertSaveFailure($address, 'landmark');
    }

    public function testSaveLandmarkGreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->landmark = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'landmark');
    }

    public function testSaveNullCity() {

        $address = $this->getCompleteAddress();
        $address->city = null;
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveEmptyCity() {

        $address = $this->getCompleteAddress();
        $address->city = '';
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveCityLessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->city = '1';
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveCityGreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->city = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'city');
    }

    public function testSaveNullState() {

        $address = $this->getCompleteAddress();
        $address->state = null;
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveEmptyState() {

        $address = $this->getCompleteAddress();
        $address->state = '';
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveStateLessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->state = '1';
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveStateGreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->state = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'state');
    }

    public function testSaveNullCountry() {

        $address = $this->getCompleteAddress();
        $address->country = null;
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveEmptyCountry() {

        $address = $this->getCompleteAddress();
        $address->country = '';
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveCountryLessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->country = '1';
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveCountryGreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->country = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'country');
    }

    public function testSaveNullPincode() {

        $address = $this->getCompleteAddress();
        $address->pincode = null;
        $this->assertSaveFailure($address, 'pincode');
    }

    public function testSaveEmptyPincode() {

        $address = $this->getCompleteAddress();
        $address->pincode = '';
        $this->assertSaveFailure($address, 'pincode');
    }

    public function testSavePincodeLessThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->pincode = '1';
        $this->assertSaveFailure($address, 'pincode');
    }

    public function testSavePincodeGreaterThanMinimumSize() {

        $address = $this->getCompleteAddress();
        $address->pincode = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveFailure($address, 'pincode');
    }
}
 