<?php namespace ClinicInTheSky;


use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserTrait;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use \Eloquent;

class User extends Eloquent implements ConfideUserInterface {

    use ConfideUser;
}
