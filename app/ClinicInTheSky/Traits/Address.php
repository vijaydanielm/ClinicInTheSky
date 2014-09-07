<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 11:08 AM
 */

namespace ClinicInTheSky;

/**
 * Trait to be used by different address entitites. Ex: PersonAddress, BranchAddress, etc.
 *
 * Class Address
 * @package ClinicInTheSky
 */
trait Address {

    public $address_line1;

    public $address_line2;

    public $address_line3;

    public $landmark;

    public $city;

    public $state;

    public $country;

    public $pincode;
} 