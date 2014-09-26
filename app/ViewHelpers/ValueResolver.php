<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/21/14
 * Time: 9:36 PM
 */

namespace ViewHelpers;


use LaravelBook\Ardent\Ardent;
use \Input;
use Illuminate\View\View;

class ValueResolver {

    /**
     * @param Ardent $obj
     * @param string $fieldName
     * @param string $prefix
     * @return mixed Resolved value
     */
    public static function resolveOldInputOrCurrent(Ardent $obj, $fieldName, $fieldPrefix = '') {

        $keyName = static::getKeyName($fieldName, $fieldPrefix);

        return (is_null($obj) || Input::old($keyName)) ? Input::old($keyName) : $obj->$fieldName;
    }

    /**
     * @param View   $view
     * @param Ardent $obj
     * @param string $fieldName
     * @param string $fieldPrefix
     */
    public static function addToViewFromModel(View $view, Ardent $obj, $fieldName, $fieldPrefix = '') {

        $keyName = static::getKeyName($fieldName, $fieldPrefix);
        $view->$keyName = static::resolveOldInputOrCurrent($obj, $fieldName, $fieldPrefix);
    }

    /**
     * @param View   $view
     * @param string $instanceName
     * @param string $fieldName
     */
    public static function addToView(View $view, $instanceName, $fieldName) {

        $model = $view->getData()[$instanceName];
        static::addToViewFromModel($view, $model, $fieldName, $instanceName);
    }

    /**
     * @param View   $view
     * @param string $instanceName
     * @param array  $fieldNames
     */
    public static function addFieldsToView(View $view, $instanceName, array $fieldNames) {

        foreach($fieldNames as $fieldName) {

            static::addToView($view, $instanceName, $fieldName);
        }
    }

    private static function getKeyName($fieldName, $prefix) {

        return strlen($prefix) > 0 ? ("$prefix" . "_" . "$fieldName") : $fieldName;
    }
} 