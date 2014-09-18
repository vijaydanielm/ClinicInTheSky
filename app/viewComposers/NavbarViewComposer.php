<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use Auth;
use Bootstrapper\Facades\Button;
use Bootstrapper\Facades\Form;
use Bootstrapper\Facades\Icon;
use Illuminate\View\View;

class NavbarViewComposer {

    public function compose(View $view) {

        //TODO: This has gone from a view composer to a view Generator. have to refactor this


        $navBarRawContent = '';

        $sessionIndependentLinks = [


        ];

        $sessionBasedLinks = [];

        $loggedInUser = Auth::user();
        if(is_null($loggedInUser)) {

            $signUpButton = Button::primary('Sign up')->asLinkTo('/signup')->prependIcon(Icon::cloud())
                                  ->addAttributes(['class' => 'navbar-btn']);
            $loginButton = Button::primary('Log in')->asLinkTo('/login')->prependIcon(Icon::create('cloud-upload'))
                                 ->addAttributes(['class' => 'navbar-btn']);
            $navBarRawContent = "<div class=\"navbar-right\">$signUpButton $loginButton</div>";

//            $navBarRawContent = $loginButton->render() . '<div class="divider" />' . $signUpButton->render();

//            $navBarRawContent = '<form class="navbar-form navbar-right" role="search">
//                                    <button type="submit" class="btn btn-default">Sign Up</button>
//                                    <button type="submit" class="btn btn-default">Log In</button>
//                                </form>';
//            $navBarRawContent = Button::submit()->render();

        } else {

            $sessionBasedLinks = [
                [
                    'link'  => '#',
                    'title' => 'Home'
                ]
            ];
        }

        $view->navBarLinks = array_merge($sessionIndependentLinks, $sessionBasedLinks);
        $view->navBarRawContent = $navBarRawContent;
    }
} 