<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 10/1/14
 * Time: 11:10 PM
 */

namespace Forms;


trait ValueTrait {

    private $value;

    /**
     * @param string $value
     * @return $this
     */
    public function value($value = null) {

        $this->value = $value;

        return $this;
    }
} 