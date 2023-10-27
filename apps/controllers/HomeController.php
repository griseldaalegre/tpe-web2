<?php

require_once './apps/views/HomeView.php';
require_once './apps/helpers/AuthHelper.php';

class HomeController
{

    private $view;

    public function __construct()
    {
        AuthHelper::verify();
        $this->view = new HomeView();
    }

    public function showHome()
    {
        $this->view->showHome();
    }
}
