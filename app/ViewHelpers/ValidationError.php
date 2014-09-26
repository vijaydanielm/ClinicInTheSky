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
     * @param string $fieldName
     */
    public static function addValidationErrorsToView(View $view, $fieldName) {

        $ucFieldName = ucfirst($fieldName);

        $sessionErrorKey = "$fieldName" . "_" . "error";
        $validationErrorsKey = "validationErrorsFor$ucFieldName";
        $hasValidationErrorsKey = "hasValidationErrorsFor$ucFieldName";

        $validationErrors = ValidationHelper::formatMessageBag(Session::get($sessionErrorKey));
        $view->dataDump = $view->getData();
        $view->$validationErrorsKey = $validationErrors;
        $view->$hasValidationErrorsKey = (count($validationErrors) > 0);
    }
}