<?php namespace ServiceProviders;

/**
 * Created by PhpStorm.
 * UserAccount: Danny
 * Date: 9/6/14
 * Time: 8:12 PM
 */


use ClinicInTheSky\Repositories\DoctorRepository;
use ClinicInTheSky\Repositories\PersonRepository;
use ClinicInTheSky\Repositories\UserAccountRepository;
use ClinicInTheSky\UserAccountController;
use ClinicInTheSky\SettingsController;
use ClinicInTheSky\Validators\UserAccountValidator;
use Forms\CustomFormBuilder;
use Forms\Facades\CustomForm;
use Illuminate\Support\ServiceProvider;
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

        $this->app->bind('ClinicInTheSky\SettingsController', function () {

            return new SettingsController(new DoctorRepository(), new PersonRepository());
        });

        $this->app->bind('ViewComposers\NavbarViewComposer', function () {

            return new NavbarViewComposer();
        });

        $this->app->bind('confide.user_validator', function () {

            return new UserAccountValidator();
        });

        $this->app->bind('customForm', function () {

            return new CustomFormBuilder();
        });
    }
}