@extends('layouts.default')

@section('body')

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Log in to start flying!</div>
            <div class="panel-body">
                <h1>Settings</h1>
                <form method="POST" action="{{{ URL::to('login') }}}" accept-charset="UTF-8" role="form">
                    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label" for="email">Username or Email</label>
                            <input class="form-control input-lg" tabindex="1"
                                   placeholder="Username or Email" type="text"
                                   name="email" id="email" value="{{{ Input::old('email') }}}" autofocus="true">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">
                                Password
                                <small>
                                    <a href="{{{ URL::to('/users/forgot_password') }}}">
                                        (Forgot your password?)
                                    </a>
                                </small>
                            </label>
                            <input class="form-control input-lg" tabindex="2"
                                   placeholder="Password" type="password"
                                   name="password" id="password">
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label class="input-lg">
                                    <input type="hidden" name="remember" value="0">
                                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        @if (Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{{ Session::get('error') }}}
                        </div>
                        @endif

                        @if (Session::get('notice'))
                        <div class="alert alert-info" role="alert">
                            {{{ Session::get('notice') }}}
                        </div>
                        @endif
                        <div class="form-group">
                            <button tabindex="3" type="submit" class="btn btn-default btn-block btn-lg">
                                <span class="glyphicon glyphicon-cloud-upload"></span>
                                Log in and start flying
                            </button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</div>
@stop