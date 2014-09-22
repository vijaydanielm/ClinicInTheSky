<?php namespace ClinicInTheSky;


use LaravelBook\Ardent\Ardent;

class Doctor extends Ardent {

    protected $table = 'doctors';

    protected $guarded = ['*'];

    public static $relationsData = [
        'user_account' => [self::BELONGS_TO, 'ClinicInTheSky\UserAccount'],
        'person'       => [self::MORPH_ONE, 'ClinicInTheSky\Person', 'name' => 'personable'],

        'clinic'       => [self::BELONGS_TO_MANY, 'ClinicInTheSky\Clinic'],
        'patients'     => [self::HAS_MANY, 'ClinicInTheSky\Patient'],
    ];
}