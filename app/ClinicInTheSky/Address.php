<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 6:09 PM
 */

namespace ClinicInTheSky;

use LaravelBook\Ardent\Ardent;


class Address extends Ardent {

    protected $guarded = ['*'];

    public static $rules = [
        'address_line1' => 'required|between:4,256',
        'address_line2' => 'between:4,256',
        'address_line3' => 'between:4,256',

        'landmark'      => 'between:4,256',
        'city'          => 'required|between:2,256',
        'state'         => 'required|between:2,256',
        'country'       => 'required|between:2,256',
        'pincode'       => 'required|between:2,256'
    ];

    public static $relationsData = [
        'addressable' => [self::MORPH_TO],
    ];
}