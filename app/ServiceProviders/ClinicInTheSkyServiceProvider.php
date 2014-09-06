<?php namespace ServiceProviders;

/**
 * Created by PhpStorm.
 * UserAccount: Danny
 * Date: 9/6/14
 * Time: 8:12 PM
 */


use ClinicInTheSky\Repositories\UserAccountRepository;
use Illuminate\Support\ServiceProvider;
use UserAccountController;

class ClinicInTheSkyServiceProvider extends ServiceProvider {

    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app->bind('UserAccountController', function () {

            return new UserAccountController(new UserAccountRepository());
        });
    }
}