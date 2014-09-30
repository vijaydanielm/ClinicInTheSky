<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 11:17 PM
 */

namespace Forms;


use Form;

class Util {

    /**
     * @param string $fieldName
     * @param string $modelName
     * @return string
     */
    public static function getFieldNameWithModel($fieldName, $modelName) {

        return empty($modelName) ? $fieldName : ($modelName . '_' . $fieldName);
    }

    /**
     * @param string $helpMessage
     * @return string
     */
    public static function getHelpBlock($helpMessage = '') {

        $helpMessageHtml = '';
        if(!empty($helpMessage)) {

            $helpMessageHtml = "<span class='help-block'>$helpMessage</span>";
        }

        return $helpMessageHtml;
    }

    /**
     * @param string $labelForFieldId
     * @param string $labelText
     * @return string
     */
    public static function getLabel($labelForFieldId, $labelText) {

        $labelHtml = '';
        if(!empty($labelText)) {

            $labelHtml = Form::label($labelForFieldId, $labelText, [
                'class' => 'control-label',
            ]);
        }

        return $labelHtml;
    }
}
