<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span
                    class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{{ URL::to('/') }}}">
                Clinic In The Sky
            </a>
        </div>

        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">

            @if($isUserLoggedIn)
            <div class="nav navbar-nav navbar-left">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{{ URL::to('/') }}}">
                            <span class="glyphicon glyphicon-home"></span>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        {{{ $loggedInUserFullName }}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{{ URL::to('settings') }}}">
                                <span class="glyphicon glyphicon-cog"></span>
                                Settings
                            </a>
                        </li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="{{{ URL::to('logout') }}}">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Log out
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="nav navbar-nav navbar-right"></div>

            @else
            <div class="nav navbar-nav navbar-right">
                @if(!isset($isSignupForm) or !$isSignupForm)
                <a class="btn btn-primary navbar-btn" href="{{{ URL::to('signup') }}}">
                    <span class="glyphicon glyphicon-cloud"></span>
                    Sign up
                </a>
                @endif
                @if(!isset($isLoginForm) or !$isLoginForm)
                <a class="btn btn-primary navbar-btn" href="{{{ URL::to('login') }}}">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                    Log in
                </a>
                @endif
            </div>
            <div class="nav navbar-nav navbar-right"></div>
            @endif

        </div>
    </div>
</nav>
