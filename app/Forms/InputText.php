<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 10:07 PM
 */

namespace Forms;

use Form;


class InputText implements CustomFormElement {

    use CustomFormElementTrait;

    private $value;

    /**
     * @param string $value
     * @return $this
     */
    public function value($value = null) {

        $this->value = $value;

        return $this;
    }

    public function render() {

        $textOptions = $this->getMergedOptions();
        $validationSupportedDiv = ValidationSupportedDiv::forCustomFormElement($this);
        $fieldNameWithModel = Util::getFieldNameWithModel($this->fieldName, $this->modelName);

        return $validationSupportedDiv->withInput(Form::text($fieldNameWithModel, $this->value, $textOptions))
                                      ->render();
    }


}