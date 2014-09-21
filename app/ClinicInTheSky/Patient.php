<?php namespace ClinicInTheSky;


use LaravelBook\Ardent\Ardent;

class Patient extends Ardent {

    protected $table = 'patients';

    protected $guarded = ['id'];

    public static $relationsData = [
        'person'  => [self::MORPH_ONE, 'ClinicInTheSky\Person', 'name' => 'personable'],

        'doctors' => [self::BELONGS_TO_MANY, 'ClinicInTheSky\Doctor'],
    ];
}