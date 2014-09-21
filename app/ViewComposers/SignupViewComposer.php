<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use \App;
use Helpers\Validation\ValidationHelper;
use Illuminate\View\View;
use \Session;

class SignupViewComposer {

    public function compose(View $view) {

        $validationErrors = ValidationHelper::formatMessageBag(Session::get('error'));

        $view->validationRules = App::make('confide.user_validator')->rules['create'];
        $view->isSignupForm = true;
        $view->validationErrors = $validationErrors;
        $view->hasValidationErrors = (count($validationErrors) > 0);
    }
} 