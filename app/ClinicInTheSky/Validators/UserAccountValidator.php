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
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ],
        'update' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]
    ];
}