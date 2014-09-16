<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 12:29 PM
 */

namespace ClinicInTheSky;

use Helpers\TestHelper as T;
use TestCase;

class AddressTest extends TestCase {

    public function testSaveCompleteAddress() {

        $address = T::createCompleteAddress();
        $this->assertSaveAddress($address);
    }

    public function testSaveNullAddressLine1() {

        $address = T::createCompleteAddress();;
        $address->address_line1 = null;
        $this->assertSaveAddressFailure($address, 'address_line1');
    }

    public function testSaveEmptyAddressLine1() {

        $address = T::createCompleteAddress();;
        $address->address_line1 = '';
        $this->assertSaveAddressFailure($address, 'address_line1');
    }

    public function testSaveAddressLine1LessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->address_line1 = '12';
        $this->assertSaveAddressFailure($address, 'address_line1');
    }

    public function testSaveAddressLine1GreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->address_line1 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'address_line1');
    }

    public function testSaveNullAddressLine2() {

        $address = T::createCompleteAddress();;
        $address->address_line2 = null;
        $this->assertSaveAddress($address);
    }

    public function testSaveEmptyAddressLine2() {

        $address = T::createCompleteAddress();;
        $address->address_line2 = '';
        $this->assertSaveAddress($address);
    }

    public function testSaveAddressLine2LessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->address_line2 = '12';
        $this->assertSaveAddressFailure($address, 'address_line2');
    }

    public function testSaveAddressLine2GreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->address_line2 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'address_line2');
    }

    public function testSaveNullAddressLine3() {

        $address = T::createCompleteAddress();;
        $address->address_line3 = null;
        $this->assertSaveAddress($address);
    }

    public function testSaveEmptyAddressLine3() {

        $address = T::createCompleteAddress();;
        $address->address_line3 = '';
        $this->assertSaveAddress($address);
    }

    public function testSaveAddressLine3LessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->address_line3 = '12';
        $this->assertSaveAddressFailure($address, 'address_line3');
    }

    public function testSaveAddressLine3GreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->address_line3 = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'address_line3');
    }

    public function testSaveNullLandmark() {

        $address = T::createCompleteAddress();;
        $address->landmark = null;
        $this->assertSaveAddress($address);
    }

    public function testSaveEmptyLandmark() {

        $address = T::createCompleteAddress();;
        $address->landmark = '';
        $this->assertSaveAddress($address);
    }

    public function testSaveLandmarkLessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->landmark = '1';
        $this->assertSaveAddressFailure($address, 'landmark');
    }

    public function testSaveLandmarkGreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->landmark = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'landmark');
    }

    public function testSaveNullCity() {

        $address = T::createCompleteAddress();;
        $address->city = null;
        $this->assertSaveAddressFailure($address, 'city');
    }

    public function testSaveEmptyCity() {

        $address = T::createCompleteAddress();;
        $address->city = '';
        $this->assertSaveAddressFailure($address, 'city');
    }

    public function testSaveCityLessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->city = '1';
        $this->assertSaveAddressFailure($address, 'city');
    }

    public function testSaveCityGreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->city = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'city');
    }

    public function testSaveNullState() {

        $address = T::createCompleteAddress();;
        $address->state = null;
        $this->assertSaveAddressFailure($address, 'state');
    }

    public function testSaveEmptyState() {

        $address = T::createCompleteAddress();;
        $address->state = '';
        $this->assertSaveAddressFailure($address, 'state');
    }

    public function testSaveStateLessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->state = '1';
        $this->assertSaveAddressFailure($address, 'state');
    }

    public function testSaveStateGreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->state = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'state');
    }

    public function testSaveNullCountry() {

        $address = T::createCompleteAddress();;
        $address->country = null;
        $this->assertSaveAddressFailure($address, 'country');
    }

    public function testSaveEmptyCountry() {

        $address = T::createCompleteAddress();;
        $address->country = '';
        $this->assertSaveAddressFailure($address, 'country');
    }

    public function testSaveCountryLessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->country = '1';
        $this->assertSaveAddressFailure($address, 'country');
    }

    public function testSaveCountryGreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->country = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'country');
    }

    public function testSaveNullPincode() {

        $address = T::createCompleteAddress();;
        $address->pincode = null;
        $this->assertSaveAddressFailure($address, 'pincode');
    }

    public function testSaveEmptyPincode() {

        $address = T::createCompleteAddress();;
        $address->pincode = '';
        $this->assertSaveAddressFailure($address, 'pincode');
    }

    public function testSavePincodeLessThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->pincode = '1';
        $this->assertSaveAddressFailure($address, 'pincode');
    }

    public function testSavePincodeGreaterThanMinimumSize() {

        $address = T::createCompleteAddress();;
        $address->pincode = rtrim($this->faker->sentence(257), ',');
        $this->assertSaveAddressFailure($address, 'pincode');
    }

    private function saveAddress(Address $address) {

        $addressable = T::createAndSaveAddressable();
        $result = $addressable->address()->save($address);

        return !is_bool($result) || (bool)$result;
    }

    private function assertSaveAddress(Address $address) {

        $this->assertTrue($this->saveAddress($address), 'Save expected to succeed, but failed');
    }

    private function assertSaveAddressFailure(Address $address, $fieldName) {

        $this->assertFalse($this->saveAddress($address), 'Save expected to fail, but succeeded');
        $this->assertSaveFailure($address, $fieldName);
    }
}
 