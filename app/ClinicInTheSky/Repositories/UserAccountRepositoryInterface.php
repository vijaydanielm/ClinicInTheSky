<?php
/**
 * Created by PhpStorm.
 * UserAccount: Danny
 * Date: 9/6/14
 * Time: 8:18 PM
 */
namespace ClinicInTheSky\Repositories;

use ClinicInTheSky\UserAccount;


/**
 * Interface UserAccountRepositoryInterface
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
interface UserAccountRepositoryInterface {
    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     *
     * @return  UserAccount UserAccount object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input);

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input);

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input);

    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     *
     * @return  boolean Success?
     */
    public function login($input);

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input);

    /**
     * Simply saves the given instance
     *
     * @param  UserAccount $instance
     *
     * @return  boolean Success
     */
    public function save(UserAccount $instance);
}