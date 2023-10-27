<?php

require_once './apps/views/AboutView.php';
require_once './apps/helpers/AuthHelper.php';

class AboutController
{

    private $view;

    public function __construct()
    {
        AuthHelper::verify('about');
        $this->view = new AboutView();
    }

    public function showAbout()
    {
        $this->view->showAbout();
    }
}
