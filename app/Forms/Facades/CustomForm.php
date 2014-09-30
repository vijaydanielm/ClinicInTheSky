<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 12:27 AM
 */

namespace Forms\Facades;


use Illuminate\Support\Facades\Facade;

class CustomForm extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {

        return 'customForm';
    }
} 