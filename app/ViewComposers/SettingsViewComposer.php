<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use Illuminate\View\View;
use ViewHelpers\FormTab;
use ViewHelpers\ValidationError;
use ViewHelpers\ValueResolver;

class SettingsViewComposer {

    public function compose(View $view) {

        ValidationError::addValidationErrorsToViewForModels($view, ['clinic', 'person', 'contact']);

        ValueResolver::addFieldsToView($view, 'person', ['first_name', 'last_name', 'gender', 'date_of_birth']);

        FormTab::addTabStatus($view, ['clinic', 'personal', 'contact']);
    }
}