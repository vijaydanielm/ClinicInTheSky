<?php

View::composer('layouts.navbar', 'ViewComposers\NavbarViewComposer');
View::composer('accounts.login', 'ViewComposers\LoginViewComposer');
View::composer('accounts.signup', 'ViewComposers\SignupViewComposer');
View::composer('settings.display', 'ViewComposers\SettingsViewComposer');