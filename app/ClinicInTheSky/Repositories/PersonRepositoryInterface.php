<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/25/14
 * Time: 8:29 PM
 */

namespace ClinicInTheSky\Repositories;


use ClinicInTheSky\Person;
use LaravelBook\Ardent\Ardent;

interface PersonRepositoryInterface {

    /**
     * @param Ardent $personable
     * @param Person $person
     * @return bool
     */
    public function save(Ardent $personable, Person $person);
}