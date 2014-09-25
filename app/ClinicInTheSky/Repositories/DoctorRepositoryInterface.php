<?php
/**
 * Created by PhpStorm.
 * UserAccount: Danny
 * Date: 9/6/14
 * Time: 8:18 PM
 */
namespace ClinicInTheSky\Repositories;

use ClinicInTheSky\Doctor;
use ClinicInTheSky\UserAccount;


/**
 * Interface DoctorRepositoryInterface
 *
 */
interface DoctorRepositoryInterface {

    /**
     * @param UserAccount $userAccount
     * @return Doctor|mixed
     */
    public function getOrCreateDoctor(UserAccount $userAccount);

}