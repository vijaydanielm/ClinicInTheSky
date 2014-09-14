<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/14/14
 * Time: 10:16 PM
 */

use Illuminate\Database\Schema\Blueprint;

class MigrationHelper {

    public static function setUpAddressTable(Blueprint $addressTable) {

        $addressTable->increments('id');
        $addressTable->string('address_line1', 256);
        $addressTable->string('address_line2', 256)->nullable();
        $addressTable->string('address_line3', 256)->nullable();
        $addressTable->string('landmark', 256)->nullable();
        $addressTable->string('city', 256);
        $addressTable->string('state', 256);
        $addressTable->string('country', 256);
        $addressTable->string('pincode', 256);
        $addressTable->timestamps();
    }

} 