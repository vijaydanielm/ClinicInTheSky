<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/21/14
 * Time: 9:36 PM
 */

namespace ViewHelpers;


use Helpers\Validation\ValidationHelper;
use Illuminate\View\View;
use Session;

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

            return ' has-error has-feedback';
        }

        return '';
    }

    /**
     * @param View   $view
     * @param string $modelName
     */
    public static function addValidationErrorsToView(View $view, $modelName) {

        $ucModelName = ucfirst($modelName);

        $sessionErrorKey = "$modelName" . "_" . "error";
        $validationErrorsKey = "validationErrorsFor$ucModelName";
        $hasValidationErrorsKey = "hasValidationErrorsFor$ucModelName";

        $validationErrors = ValidationHelper::formatMessageBag(Session::get($sessionErrorKey));
        $view->$validationErrorsKey = $validationErrors;
        $view->$hasValidationErrorsKey = (count($validationErrors) > 0);
    }

    public static function addValidationErrorsToViewForModels(View $view, array $modelNames) {

        foreach($modelNames as $modelName) {

            static::addValidationErrorsToView($view, $modelName);
        }
    }
}