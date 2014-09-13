<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 11:40 AM
 */

namespace ClinicInTheSky;

use LaravelBook\Ardent\Ardent;

class PersonAddress extends Ardent {

    protected $table = 'person_addresses';

    protected $guarded = ['id', 'person_id'];

    public static $rules = [
        'address_line1' => 'required|between:4,256',
        'address_line2' => 'sometimes|between:4,256',
        'address_line3' => 'sometimes|between:4,256',

        'landmark'      => 'sometimes|between:2,256',
        'city'          => 'required|between:2,256',
        'state'         => 'required|between:2,256',
        'country'       => 'required|between:2,256',
        'pincode'       => 'required|between:2,256'
    ];

    public static $relationsData = [
        'person' => [self::BELONGS_TO, 'ClinicInTheSky\Person']
    ];
}