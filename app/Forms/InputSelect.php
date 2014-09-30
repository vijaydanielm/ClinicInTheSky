<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 10:07 PM
 */

namespace Forms;

use Form;


class InputSelect implements CustomFormElement {

    use CustomFormElementTrait;

    private $selected;
    private $selectionList;

    public function __construct($fieldName, $modelName = null) {

        $this->fieldName = $fieldName;
        $this->modelName = $modelName;
    }

    /**
     * @param string $selected
     * @return $this
     */
    public function selected($selected = null) {

        $this->selected = $selected;

        return $this;
    }

    /**
     * @param array $selectionList
     * @return $this
     */
    public function selectionList(array $selectionList = []) {

        $this->selectionList = $selectionList;

        return $this;
    }

    public function render() {

        $mergedOptions = $this->getMergedOptions();
        $validationSupportedDiv = ValidationSupportedDiv::forCustomFormElement($this);
        $fieldNameWithModel = Util::getFieldNameWithModel($this->fieldName, $this->modelName);

        Form::select($fieldNameWithModel, $this->selectionList, $this->selected, $mergedOptions);

        return $validationSupportedDiv->withInput(Form::select($fieldNameWithModel, $this->selectionList,
                                                               $this->selected, $mergedOptions))
                                      ->render();
    }


}