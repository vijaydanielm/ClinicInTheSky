<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use App;
use Helpers\Validation\ValidationHelper;
use Illuminate\View\View;
use Session;
use ViewHelpers\ValidationError;
use ViewHelpers\ValueResolver;
use \Input;

class SettingsViewComposer {

    public function compose(View $view) {

        ValidationError::addValidationErrorsToView($view, 'clinic');
        ValidationError::addValidationErrorsToView($view, 'person');
        ValidationError::addValidationErrorsToView($view, 'contact');

        ValueResolver::addToView($view, 'person', 'first_name');
        ValueResolver::addToView($view, 'person', 'last_name');
        ValueResolver::addToView($view, 'person', 'gender');
        ValueResolver::addToView($view, 'person', 'date_of_birth');

        $view->tabStatus = [
            'clinic'   => $this->getTabStatus('clinic'),
            'personal' => $this->getTabStatus('personal'),
            'contact'  => $this->getTabStatus('contact')
        ];

    }

    private function getTabStatus($tabName) {

        $previousActiveTab = Input::old('activeTab') ? Input::old('activeTab') : 'clinic';
        if($tabName == $previousActiveTab) {

            return 'active';
        }

        return '';
    }
} 