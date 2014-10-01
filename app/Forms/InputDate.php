<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 10:07 PM
 */

namespace Forms;

use Form;


class InputDate implements CustomFormElement {

    use CustomFormElementTrait;

    use ValueTrait;

    public function render() {

        $textOptions = $this->getMergedOptions();
        $validationSupportedDiv = ValidationSupportedDiv::forCustomFormElement($this);
        $fieldNameWithModel = Util::getFieldNameWithModel($this->fieldName, $this->modelName);

        return $validationSupportedDiv->withInput(Form::text($fieldNameWithModel, $this->value, $textOptions))
                                      ->render();
    }


}