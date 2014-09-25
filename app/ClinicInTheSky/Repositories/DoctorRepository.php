<?php namespace ClinicInTheSky\Repositories;


use ClinicInTheSky\Doctor;
use ClinicInTheSky\UserAccount;

/**
 *
 * Class DoctorRepository
 *
 */
class DoctorRepository implements DoctorRepositoryInterface {

    /**
     * @param UserAccount $userAccount
     * @return Doctor|mixed
     */
    public function getOrCreateDoctor(UserAccount $userAccount) {

        $doctor = $userAccount->doctor;
        if(is_null($doctor)) {

            $doctor = new Doctor();
            $userAccount->doctor()->save($doctor);
        }

        return $doctor;
    }
}
