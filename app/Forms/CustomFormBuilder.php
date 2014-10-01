<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 12:27 AM
 */

namespace Forms;

use Constants\TabConstants;
use Form;

class CustomFormBuilder {

    /**
     * @param string $urlTo URL to post the data to
     * @return string
     */
    public function postFormTo($urlTo) {

        return Form::open([
                              'method'         => 'POST',
                              'url'            => $urlTo,
                              'accept-charset' => 'UTF-8',
                              'role'           => 'form'
                          ]) .
               Form::token();
    }

    /**
     * @param string $activeTabName
     * @return string
     */
    public function setActiveTab($activeTabName) {

        return Form::hidden(TabConstants::ACTIVE_TAB, $activeTabName);
    }

    /**
     * @param string $fieldName
     * @param string $modelName
     * @return InputText
     */
    public function text($fieldName, $modelName) {

        return new InputText($fieldName, $modelName);
    }

    /**
     * @param string $fieldName
     * @param string $modelName
     * @param string $value
     * @return InputText
     */
    public function textValue($fieldName, $modelName, $value) {

        return $this->text($fieldName, $modelName)->value($value);
    }

    /**
     * @param string $fieldName
     * @param string $modelName
     * @param array  $selectionList
     * @return InputSelect
     */
    public function select($fieldName, $modelName, array $selectionList) {

        return $this->selectDefault($fieldName, $modelName, $selectionList, null);
    }

    /**
     * @param string $fieldName
     * @param string $modelName
     * @param array  $selectionList
     * @param string $defaultSelection
     * @return InputSelect
     */
    public function selectDefault($fieldName, $modelName, array $selectionList, $defaultSelection = null) {

        return $this->select($fieldName, $modelName, $selectionList)->value($defaultSelection);
    }

    /**
     * @param string $fieldName
     * @param string $modelName
     * @param string $dateFormat
     * @return InputDate
     */
    public function date($fieldName, $modelName, $dateFormat = null) {

        $inputDate = new InputDate($fieldName, $modelName);

        return $inputDate->dateOnly($dateFormat);
    }

    /**
     * @return string
     */
    public function close() {

        return '</form>';
    }
} 