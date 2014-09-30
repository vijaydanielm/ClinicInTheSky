<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 11:38 PM
 */

namespace Forms;


use ViewHelpers\ValidationError;

class ValidationSupportedDiv implements Renderable {

    private $divStartHtml;
    private $divEndHtml;

    private $labelHtml = '';
    private $inputHtml = '';
    private $helpBlockHtml = '';

    private $fieldName;
    private $modelName;

    /**
     * @param CustomFormElement $formElement
     * @return ValidationSupportedDiv
     */
    public static function forCustomFormElement(CustomFormElement $formElement) {

        $validationSupportedDiv = new ValidationSupportedDiv($formElement->getFieldName(),
                                                             $formElement->getModelName(),
                                                             $formElement->wasValidationErrorsSet(),
                                                             $formElement->getValidationErrors());

        return $validationSupportedDiv->withLabel($formElement->getLabelText())
                                      ->withHelpMessage($formElement->getHelpMessage());
    }

    public function __construct($fieldName, $modelName, $wasValidationErrorsSet, $validationErrors) {

        $this->fieldName = $fieldName;
        $this->modelName = $modelName;

        $divStartHtml = '';
        $divEndHtml = '';
        if($wasValidationErrorsSet) {

            $validationErrorsFeedback = ValidationError::feedback($validationErrors, $fieldName);
            $divStartHtml = "<div class='form-group $validationErrorsFeedback'>";
            $divEndHtml = "</div>";
            if(array_key_exists($fieldName, $validationErrors)) {

                $validationErrorText = $validationErrors[$fieldName];
                $divEndHtml = "    <div class='alert alert-error alert-danger' role='alert'>
                                        $validationErrorText
                                    </div>
                                    <span class='glyphicon glyphicon-remove form-control-feedback'></span>
                               </div>";
            }
        }

        $this->divStartHtml = $divStartHtml;
        $this->divEndHtml = $divEndHtml;
    }

    /**
     * @param string $content
     * @return string
     */
    public function generateWithContent($content = '') {

        return "$this->divStartHtml $content $this->divEndHtml";
    }

    /**
     * @param string $labelHtml
     * @return $this
     */
    public function withLabelHtml($labelHtml = '') {

        $this->labelHtml = $labelHtml;

        return $this;
    }

    /**
     * @param string $inputHtml
     * @return $this
     */
    public function withInput($inputHtml = '') {

        $this->inputHtml = $inputHtml;

        return $this;
    }

    /**
     * @param string $helpBlockHtml
     * @return $this
     */
    public function withHelpBlockHtml($helpBlockHtml = '') {

        $this->helpBlockHtml = $helpBlockHtml;

        return $this;
    }

    /**
     * @param string $labelText
     * @return $this
     */
    public function withLabel($labelText) {

        $this->labelHtml = Util::getLabel(Util::getFieldNameWithModel($this->fieldName, $this->modelName), $labelText);

        return $this;
    }

    /**
     * @param string $helpMessage
     * @return $this
     */
    public function withHelpMessage($helpMessage = '') {

        $this->helpBlockHtml = Util::getHelpBlock($helpMessage);

        return $this;
    }

    /**
     * @return string
     */
    public function render() {

        return "$this->divStartHtml $this->labelHtml $this->inputHtml $this->helpBlockHtml $this->divEndHtml";
    }

    public function __toString() {

        return $this->render();
    }
} 