<?php
namespace ClinicInTheSky;


use App;
use ClinicInTheSky\Repositories\UserAccountRepositoryInterface;
use Confide;
use Config;
use Controller;
use Input;
use Lang;
use Mail;
use Redirect;
use View;

/**
 * UserAccountController Class
 *
 * Implements actions regarding user management
 */
class UserAccountController extends Controller {

    private $userRepository;

    public function __construct(UserAccountRepositoryInterface $userRepository) {

        $this->userRepository = $userRepository;
    }

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create() {

        if(Confide::user()) {

            return Redirect::to('/');
        }

        return View::make('accounts.signup');
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store() {

        if(Confide::user()) {

            return Redirect::to('/');
        }

        $repo = $this->userRepository;
        $user = $repo->signup(Input::all());

        if($user->id) {
            if(Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                        function ($message) use ($user) {
                            $message
                                ->to($user->email, $user->username)
                                ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                        }
                );
            }

            return Redirect::action('ClinicInTheSky\UserAccountController@login')
                           ->with('notice',
                                  'Your account has been successfully created. ' .
                                  'Please activate it by clicking the link in the confirmation email sent to ' .
                                  'your email address and then log in.');
        } else {
            return Redirect::action('ClinicInTheSky\UserAccountController@create')
                           ->withInput(Input::except('password'))
                           ->with('error', $user->errors());
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login() {
        if(Confide::user()) {
            return Redirect::to('/');
        } else {
            return View::make('accounts.login');
        }
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin() {
        $repo = $this->userRepository;
        $input = Input::all();

        if($repo->login($input)) {
            return Redirect::intended('/');
        } else {
            if($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif($repo->existsButNotConfirmed($input)) {
                $err_msg =
                    'You have not activated your account yet. ' .
                    'Please activate your account by clicking on the confirmation link in your email, ' .
                    'and try logging in again';
            } else {
//                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
                $err_msg = 'Incorrect username/email or password. ' .
                           'Please try again with the right credentials';
            }

            return Redirect::action('ClinicInTheSky\UserAccountController@login')
                           ->withInput(Input::except('password'))
                           ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code) {
        if(Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');

            return Redirect::action('ClinicInTheSky\UserAccountController@login')
                           ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');

            return Redirect::action('ClinicInTheSky\UserAccountController@login')
                           ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword() {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword() {
        if(Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');

            return Redirect::action('ClinicInTheSky\UserAccountController@login')
                           ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');

            return Redirect::action('ClinicInTheSky\UserAccountController@doForgotPassword')
                           ->withInput()
                           ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token) {
        return View::make(Config::get('confide::reset_password_form'))
                   ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword() {
        $repo = App::make('ClinicInTheSky\UserAccountRepository');
        $input = array(
            'token'                 => Input::get('token'),
            'password'              => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');

            return Redirect::action('ClinicInTheSky\UserAccountController@login')
                           ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');

            return Redirect::action('ClinicInTheSky\UserAccountController@resetPassword',
                                    array('token' => $input['token']))
                           ->withInput()
                           ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout() {
        Confide::logout();

        return Redirect::to('/');
    }
}
