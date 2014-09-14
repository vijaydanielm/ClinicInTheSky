<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 12:29 PM
 */

namespace ClinicInTheSky;

use Helpers\TestHelper as T;

class ClinicAddressTest extends AddressTestCase {

    protected function getCompleteAddress() {

        return T::createCompleteAddressWithClinic();
    }
}
 