<?php namespace ClinicInTheSky;


use LaravelBook\Ardent\Ardent;

class Person extends Ardent {

    protected $table = 'persons';

    protected $fillable = ['first_name', 'last_name', 'gender', 'date_of_birth'];

    public static $rules = [
        'first_name'    => 'required|between:2,128|regex:/[a-zA-Z]+/',
        'last_name'     => 'sometimes|between:1,128|regex:/[a-zA-Z]+/',
        'gender'        => 'required|in:male,female,other',
        'date_of_birth' => 'required|date_format:Y-m-d|after:1900/01/01',
        'address'       => 'required'
    ];

    public static $relationsData = [
        'address' => [self::HAS_ONE, 'ClinicInTheSky\PersonAddress', 'foreignKey' => 'person_id']
    ];
}