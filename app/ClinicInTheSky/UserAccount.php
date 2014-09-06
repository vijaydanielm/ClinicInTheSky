<?php namespace ClinicInTheSky;


use Eloquent;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserTrait;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class UserAccount extends Eloquent implements ConfideUserInterface {

    use ConfideUser;
}
