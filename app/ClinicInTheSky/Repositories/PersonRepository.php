<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/25/14
 * Time: 8:32 PM
 */

namespace ClinicInTheSky\Repositories;


use ClinicInTheSky\Person;
use LaravelBook\Ardent\Ardent;

class PersonRepository implements PersonRepositoryInterface {

    /**
     * @param Ardent $personable
     * @param Person $person
     * @return bool
     */
    public function save(Ardent $personable, Person $person) {

        $personToBeSaved = $person;
        $existingPerson = $personable->person;
        if(!is_null($existingPerson)) {

            $existingPerson->first_name = $person->first_name;
            $existingPerson->last_name = $person->last_name;
            $existingPerson->gender = $person->gender;
            $existingPerson->date_of_birth = $person->date_of_birth;

            $personToBeSaved = $existingPerson;
        }

        return $personable->person()->save($personToBeSaved) ? true : $personToBeSaved;
    }
}