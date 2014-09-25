<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/21/14
 * Time: 9:36 PM
 */

namespace ViewHelpers;


use LaravelBook\Ardent\Ardent;

class ValidationError {

    /**
     * @param array $validationErrors
     * @param       $fieldName
     * @return string
     */
    public static function feedback(array $validationErrors = null, $fieldName) {

        if(!is_null($validationErrors) and
           array_key_exists($fieldName, $validationErrors) and $validationErrors[$fieldName]
        ) {

            return " has-error has-feedback";
        }

        return "";
    }

    public static function oldOrValue(Ardent $obj, $fieldName, $prefix = '') {

        $oldValueKeyName = "$prefix";
    }
} 