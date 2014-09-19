<?php namespace ServiceProviders;

/**
 * Created by PhpStorm.
 * UserAccount: Danny
 * Date: 9/6/14
 * Time: 8:12 PM
 */


use ClinicInTheSky\Repositories\UserAccountRepository;
use ClinicInTheSky\UserAccountController;
use ClinicInTheSky\Validators\UserAccountValidator;
use Illuminate\Support\ServiceProvider;
use \View;
use ViewComposers\NavbarViewComposer;

class ClinicInTheSkyServiceProvider extends ServiceProvider {

    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app->bind('ClinicInTheSky\UserAccountController', function () {

            return new UserAccountController(new UserAccountRepository());
        });

        $this->app->bind('ViewComposers\NavbarViewComposer', function () {

            return new NavbarViewComposer();
        });

        $this->app->bind('confide.user_validator', function () {

            return new UserAccountValidator();
        });
    }
}