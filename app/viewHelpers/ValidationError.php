<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/21/14
 * Time: 9:36 PM
 */

namespace ViewHelpers;


class ValidationError {

    public static function feedback(array $validationErrors = null, $fieldName) {

        if(!is_null($validationErrors) and
           array_key_exists($fieldName, $validationErrors) and $validationErrors[$fieldName]
        ) {

            return " has-error has-feedback";
        }

        return "";
    }
} 