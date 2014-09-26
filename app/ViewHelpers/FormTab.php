<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/26/14
 * Time: 7:12 PM
 */

namespace ViewHelpers;


use Illuminate\View\View;
use Input;

class FormTab {

    /**
     * @param View   $view
     * @param array  $tabNames
     * @param string $defaultTabName
     */
    public static function addTabStatus(View $view, array $tabNames, $defaultTabName = null) {

        $resolvedDefaultTabName = $defaultTabName;
        if(is_null($resolvedDefaultTabName) && count($tabNames) > 0) {

            $resolvedDefaultTabName = $tabNames[0];
        }

        $tabStatus = [];
        foreach($tabNames as $tabName) {

            $tabStatus[$tabName] = static::getTabStatus($tabName, $resolvedDefaultTabName);
        }

        $view->tabStatus = $tabStatus;
    }

    private static function getTabStatus($tabName, $defaultTabName) {

        $previousActiveTab = Input::old('activeTab') ? Input::old('activeTab') : $defaultTabName;
        if($tabName == $previousActiveTab) {

            return 'active';
        }

        return '';
    }

} 