<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/14/14
 * Time: 7:43 AM
 */

namespace ClinicInTheSky;


use LaravelBook\Ardent\Ardent;

class Clinic extends Ardent {

    protected $table = 'clinics';

    protected $guarded = ['*'];

    public static $rules = [
        'name' => 'required|between:2,256'
    ];

    public static $relationsData = [
        'address' => [self::MORPH_ONE, 'ClinicInTheSky\Address', 'name' => 'addressable'],
        'doctors' => [self::HAS_MANY, 'ClinicInTheSky\Doctor'],
    ];
}