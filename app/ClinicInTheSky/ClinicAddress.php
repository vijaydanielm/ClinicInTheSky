<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 11:40 AM
 */

namespace ClinicInTheSky;

class ClinicAddress extends Address {

    protected $table = 'clinic_addresses';

    protected $guarded = ['id', 'clinic_id'];

    public static $relationsData = [
        'clinic' => [self::BELONGS_TO, 'ClinicInTheSky\Clinic']
    ];
}