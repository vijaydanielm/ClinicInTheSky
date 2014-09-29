<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/29/14
 * Time: 6:37 AM
 */

namespace Helpers\Controllers;

use Confide;


class RedirectionHelper {

    //TODO: Refactor out to inject Confide or general dependency for whether user is logged in

    public static function redirectIfLoggedIn($redirectedPath = '/') {

        if(Confide::user()) {

            return null;
        }
    }
} 