<?php

class UserLogic
{
  public static function SignUp()
  {
    $web3 = Web2_database::getInstance();
    $Users = new Users_table();
    return $Users->register($web3->getDB());
  }

  public static function SignIn()
  {
    $web3 = Web2_database::getInstance();
    $Users = new Users_table();
    return $Users->enter($web3->getDB());
  }
}
