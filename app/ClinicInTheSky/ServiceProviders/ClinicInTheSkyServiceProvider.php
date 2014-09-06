<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 9/6/14
 * Time: 8:12 PM
 */

namespace ClinicInTheSky\ServiceProviders;


use ClinicInTheSky\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class ClinicInTheSkyServiceProvider extends ServiceProvider {

    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app->bind('UsersController', function () {

            return new \UsersController(new UserRepository());
        });
    }
}