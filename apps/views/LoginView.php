<?php

class LoginView
{
  public function showLogin($error = null)
  {
    require_once './templates/login.phtml';
  }

  public function showSingup($error = null)
  {
    require_once './templates/charge.phtml';
  }
}
