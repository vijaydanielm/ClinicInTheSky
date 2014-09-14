<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/7/14
 * Time: 11:40 AM
 */

namespace ClinicInTheSky;

class PersonAddress extends Address {

    protected $table = 'person_addresses';

    protected $guarded = ['id', 'person_id'];

    public static $relationsData = [
        'person' => [self::BELONGS_TO, 'ClinicInTheSky\Person']
    ];
}