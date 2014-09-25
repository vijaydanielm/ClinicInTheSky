<?php
namespace ClinicInTheSky;


use ClinicInTheSky\Repositories\DoctorRepositoryInterface;
use ClinicInTheSky\Repositories\PersonRepositoryInterface;
use Confide;
use Controller;
use Input;
use Redirect;
use View;

/**
 * SettingsController Class
 *
 * Implements actions regarding user settings
 */
class SettingsController extends Controller {

    private $doctorRepository;
    private $personRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository, PersonRepositoryInterface $personRepository) {

        $this->doctorRepository = $doctorRepository;
        $this->personRepository = $personRepository;
    }

    public function display() {

        $doctor = $this->doctorRepository->getOrCreateDoctor(Confide::user());
        $person = $doctor->person;

        return View::make('settings.display')->with('person', $person);
    }

    public function saveDoctorPersonDetails() {

        $person = new Person();
        $person->first_name = Input::get('person_first_name');
        $person->last_name = Input::get('person_last_name');
        $person->gender = Input::get('person_gender');
        $person->date_of_birth = Input::get('person_date_of_birth');

        $doctor = $this->doctorRepository->getOrCreateDoctor(Confide::user());
        if($this->personRepository->save($doctor, $person)) {

            return Redirect::action('ClinicInTheSky\SettingsController@display')
                           ->with('person_notice', 'Your personal details have been updated successfully')
                           ->withInput(['activeTab' => 'personal']);

        } else {

            return Redirect::action('ClinicInTheSky\SettingsController@display')
                           ->withInput()
                           ->with('person_error', $person->errors());
        }
    }
}
