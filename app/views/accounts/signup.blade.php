@extends('layouts.default')

@section('body')

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Sign up to start flying!</div>
            <div class="panel-body">
                <form method="POST" action="{{{ URL::to('signup') }}}" accept-charset="UTF-8" role="form">
                    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <fieldset>
                        <div
                            class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'username') }}}">
                            <label class="control-label" for="username">Username</label>
                            <input required="true" class="form-control input-lg" id="username"
                                   placeholder="Enter the username you want" type="text" name="username"
                                   value="{{{ Input::old('username') }}}" autofocus="true" tabindex="1">
                            <span class="help-block">
                                Username should be between 4 and 20 characters long and consist of
                                alphabets and numbers only
                            </span>
                            @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'username'])
                        </div>
                        <div
                            class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'email') }}}">
                            <label class="control-label" for="email">
                                Email
                                <small>(Confirmation required)</small>
                            </label>
                            <input required="true" class="form-control input-lg" id="email"
                                   placeholder="Enter your email address" type="text" name="email"
                                   value="{{{ Input::old('email') }}}" tabindex="2">
                            <span class="help-block">
                                We'll send a confirmation mail to activate your account.
                                You can log in using your user name or your email
                            </span>
                            @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'email'])
                        </div>
                        <div
                            class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'password') }}}">
                            <label class="control-label" for="password">
                                Password
                            </label>
                            <input required="true" class="form-control input-lg" id="password"
                                   placeholder="Enter your password" type="password" name="password"
                                   tabindex="3">
                            <span class="help-block">
                                Your password should be between 6 and 64 characters long
                            </span>
                            @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'password'])
                        </div>
                        <div
                            class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'password_confirmation') }}}">
                            <label class="control-label" for="password_confirmation">
                                Confirm password
                            </label>
                            <input required="true" class="form-control input-lg" id="password_confirmation"
                                   placeholder="Confirm your password" type="password" name="password_confirmation"
                                   tabindex="4">
                            <br>
                            @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'password_confirmation'])
                        </div>

                        @if($hasValidationErrors)
                        <div class="alert alert-error alert-danger" role="alert">
                            Please fix the above errors in order to continue creating your account.
                        </div>
                        @endif

                        @include('helpers.displayNotice')

                        <div class="form-group">
                            <button tabindex="5" type="submit" class="btn btn-default btn-block btn-lg">
                                <span class="glyphicon glyphicon-cloud"></span>
                                Create my account
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@stop