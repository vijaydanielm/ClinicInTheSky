@extends('layouts.default')

@section('body')

<div class="row center-block">
    <div class="col-lg-6">
        <div class="well bs-component">
            {{ Former::legend('Sign up for a new account') }}
            <form method="POST" action="{{{ URL::to('signup') }}}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <fieldset>
                    <div class="form-group">
                        <label for="username"> {{{ Lang::get('confide::confide.username') }}} </label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}"
                               type="text"
                               name="username" id="username" value="{{{ Input::old('username') }}}">
                    </div>
                    <div class="form-group">
                        <label for="email"> {{{ Lang::get('confide::confide.e_mail') }}}
                            <small> {{ Lang::get('confide::confide.signup.confirmation_required') }}</small>
                        </label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}"
                               type="text"
                               name="email"
                               id="email" value="{{{ Input::old('email') }}}">
                    </div>
                    <div class="form-group">
                        <label for="password"> {{{ Lang::get('confide::confide.password') }}} </label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}"
                               type="password"
                               name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"> {{{ Lang::get('confide::confide.password_confirmation')
                            }}}</label>
                        <input class="form-control"
                               placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}"
                               type="password" name="password_confirmation" id=
                        "password_confirmation">
                    </div>

                    @if(Session::get('error'))
                    <div class="alert alert-error alert-danger">
                        @if(is_array(Session::get('error')))
                        {{ head(Session::get('error')) }}
                        @endif
                    </div>
                    @endif

                    @if(Session::get('notice'))
                    <div class="alert">{{ Session::get('notice') }}</div>
                    @endif

                    <div class="form-actions form-group col-center-block">
                        <button type="submit" class="btn btn-primary"> {{{ Lang::get('confide::confide.signup.submit')
                            }}}
                        </button>
                    </div>

                </fieldset>

            {{ Former::close() }}
        </div>
    </div>
</div>
@stop
@stop