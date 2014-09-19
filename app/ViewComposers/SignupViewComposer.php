<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use \App;
use Illuminate\View\View;

class SignupViewComposer {

    public function compose(View $view) {

        $view->validationRules = App::make('confide.user_validator')->rules['create'];
        $view->isSignupForm = true;
    }
} 