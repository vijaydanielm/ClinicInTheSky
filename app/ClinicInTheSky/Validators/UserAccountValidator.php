<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/19/14
 * Time: 10:52 PM
 */

namespace ClinicInTheSky\Validators;


use Zizaco\Confide\UserValidator;

class UserAccountValidator extends UserValidator {

    public $rules = [

        'create' => [
            'username' => 'required|alphanum|between:4,32',
            'email'    => 'required|email',
            'password' => 'required|between:6,64',
        ],
        'update' => [
            'username' => 'required|alphanum|between:4,32',
            'email'    => 'required|email',
            'password' => 'required|between:6,64',
        ]
    ];
}