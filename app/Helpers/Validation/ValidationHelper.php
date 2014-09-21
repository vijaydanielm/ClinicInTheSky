<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/21/14
 * Time: 9:42 PM
 */

namespace Helpers\Validation;


use Illuminate\Support\MessageBag;

class ValidationHelper {

    public static function formatMessageBag(MessageBag $messageBag = null) {

        $errors = [];

        if(!is_null($messageBag)) {

            foreach($messageBag->toArray() as $errorField => $errorMessages) {

                $errorMessage = $errorMessages[0];
                if($errorMessage == 'validation.alphanum') {

                    $errorMessage = 'Please make sure that you use either alphabets or numbers only.';

                } elseif($errorField = 'password_confirmation' and $errorMessage = 'Wrong confirmation code') {

                    $errorMessage =
                        'Password and password confirmation do not match. Please make sure you type the same password in both places';
                }

                $errors[$errorField] = $errorMessage;
            }
        }

        return $errors;
    }
} 