<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use ClinicInTheSky\Person;
use Confide;
use Illuminate\View\View;

class NavbarViewComposer {

    public function compose(View $view) {

        $loggedInUserAccount = Confide::user();

        $view->isUserLoggedIn = !is_null($loggedInUserAccount);
        $view->loggedInUserFullName = null;

        if($loggedInUserAccount) {

            $person = Person::find($loggedInUserAccount->id);
            if($person) {

                $view->loggedInUserFullName = "$person->first_name $person->last_name";

            } else {

                $view->loggedInUserFullName = $loggedInUserAccount->username;
            }
        }
    }
} 