<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 10:07 PM
 */

namespace Forms;

use Form;


/**
 * Generates a date input element using the bootstrap datetimepicker.
 * See http://eonasdan.github.io/bootstrap-datetimepicker
 * Class InputDate
 * @package Forms
 */
class InputDate implements CustomFormElement {

    use CustomFormElementTrait;

    use ValueTrait;

    private $dateOnly;
    private $dateFormat;
    private $minDate;
    private $maxDate;

    /**
     * @param string $dateFormat
     * @return $this
     */
    public function dateOnly($dateFormat = null) {

        $this->dateOnly = true;
        $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * @param string $minDate
     * @return $this
     */
    public function minDate($minDate) {

        $this->minDate = $minDate;

        return $this;
    }

    /**
     * @param string $maxDate
     * @return $this
     */
    public function maxDate($maxDate) {

        $this->maxDate = $maxDate;

        return $this;
    }

    /**
     * @return string
     */
    public function render() {

        $definedOptions = $this->getDefinedOptions();
        if(isset($this->dateOnly)) {

            $definedOptions['data-date-pickTime'] = 'false';
        }
        if(isset($this->dateFormat)) {

            $definedOptions['data-date-format'] = $this->dateFormat;
        }
        if(isset($this->minDate)) {

            $definedOptions['data-date-minDate'] = $this->minDate;
        }
        if(isset($this->maxDate)) {

            $definedOptions['data-date-maxDate'] = $this->maxDate;
        }
        $mergedOptions = array_merge($definedOptions, $this->options);

        $fieldNameWithModel = Util::getFieldNameWithModel($this->fieldName, $this->modelName);
        $datePickerId = $fieldNameWithModel . '_picker';
        $dateTextBoxHtml = Form::text($fieldNameWithModel, $this->value, $mergedOptions);
        $inputHtml = "
            <div class='input-group date' id='$datePickerId'>
                <span class='input-group-addon datepickerbutton'>
                    <span class='glyphicon glyphicon-calendar'></span>
                </span>
                $dateTextBoxHtml
            </div>
            <script type='text/javascript'>
                $(function () {
                    $('#$datePickerId').datetimepicker();
                });
            </script>
        ";

        $validationSupportedDiv = ValidationSupportedDiv::forCustomFormElement($this);

        return $validationSupportedDiv->withInput($inputHtml)
                                      ->render();
    }
}