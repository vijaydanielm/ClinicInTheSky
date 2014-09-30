<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 10/1/14
 * Time: 12:11 AM
 */

namespace Forms;


trait CustomFormElementTrait {

    private $fieldName;
    private $modelName;
    private $labelText;
    private $helpMessage;

    private $autofocus = false;
    private $tabIndex;
    private $placeHolder;
    private $required = false;

    private $options = [];

    private $validationErrors = [];
    private $wasValidatonErrorsSet = false;

    /**
     * @param string $fieldName
     * @param string $modelName
     */
    public function __construct($fieldName, $modelName = null) {

        $this->fieldName = $fieldName;
        $this->modelName = $modelName;
    }


    public function label($labelText = null) {

        $this->labelText = $labelText;

        return $this;
    }

    public function required() {

        $this->required = true;

        return $this;
    }

    public function autofocus() {

        $this->autofocus = true;

        return $this;
    }

    public function tabIndex($tabIndex) {

        $this->tabIndex = $tabIndex;

        return $this;
    }

    public function placeHolder($placeHolder = null) {

        $this->placeHolder = $placeHolder;

        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function options(array $options = []) {

        $this->options = $options;

        return $this;
    }

    public function helpMessage($helpMessage = null) {

        $this->helpMessage = $helpMessage;

        return $this;
    }

    public function validationErrors(array $validationErrors = []) {

        $this->validationErrors = $validationErrors;
        $this->wasValidatonErrorsSet = true;

        return $this;
    }


    public function getDefinedOptions() {

        $fieldNameWithModel = Util::getFieldNameWithModel($this->fieldName, $this->modelName);

        $definedOptions = [
            'id'    => $fieldNameWithModel,
            'class' => 'form-control',
        ];
        if($this->autofocus) {

            $definedOptions['autofocus'] = 'true';
        }
        if($this->required) {

            $definedOptions['required'] = 'true';
        }
        if(isset($this->tabIndex)) {

            $definedOptions['tabindex'] = $this->tabIndex;
        }
        if(isset($this->placeHolder)) {

            $definedOptions['placeholder'] = $this->placeHolder;
        }

        return $definedOptions;
    }

    public function getMergedOptions() {

        return array_merge($this->getDefinedOptions(), $this->options);
    }

    public function getFieldName() {

        return $this->fieldName;
    }

    public function getModelName() {

        return $this->modelName;
    }

    public function wasValidationErrorsSet() {

        return $this->wasValidatonErrorsSet;
    }

    public function getValidationErrors() {

        return $this->validationErrors;
    }

    public function getLabelText() {

        return $this->labelText;
    }

    public function getHelpMessage() {

        return $this->helpMessage;
    }

    public function getOptions() {

        return $this->options;
    }

    public function __toString() {

        return $this->render();
    }
} 