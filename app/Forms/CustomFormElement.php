<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/30/14
 * Time: 11:57 PM
 */

namespace Forms;


interface CustomFormElement extends Renderable {

    public function getFieldName();

    public function getModelName();

    public function wasValidationErrorsSet();

    public function getValidationErrors();

    public function getLabelText();

    public function getHelpMessage();

    public function getOptions();
} 