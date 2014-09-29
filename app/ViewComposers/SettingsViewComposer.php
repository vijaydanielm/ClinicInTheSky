<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use Constants\Settings\Models;
use Constants\Settings\PersonalInput;
use Constants\Settings\Tabs;
use Illuminate\View\View;
use ViewHelpers\FormTab;
use ViewHelpers\ValidationError;
use ViewHelpers\ValueResolver;

class SettingsViewComposer {

    public function compose(View $view) {

        $models = [Models::CLINIC, Models::PERSON, Models::CONTACT];
        $tabs = [Tabs::CLINIC, Tabs::PERSONAL, Tabs::CONTACT];

        ValidationError::addValidationErrorsToViewForModels($view, $models);

        ValueResolver::addFieldsToView($view, Models::PERSON,
                                       [PersonalInput::FIRST_NAME, PersonalInput::LAST_NAME, PersonalInput::GENDER,
                                        PersonalInput::DATE_OF_BIRTH]);

        FormTab::addTabStatus($view, $tabs);
    }
}