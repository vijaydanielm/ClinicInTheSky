<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/18/14
 * Time: 10:36 PM
 */

namespace ViewComposers;

use \Illuminate\View\View;
use \Auth;

class NavbarViewComposer {

    public function compose(View $view) {

        $navBarRawContent = '';
        $navBarLinks = [

            [
                'link'  => '#',
                'title' => 'Home'
            ]
        ];

//        $loggedInUser = Auth::user();

        $view->navBarLinks = $navBarLinks;
        $view->navBarRawContent = $navBarRawContent;
    }
} 