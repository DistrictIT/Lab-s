<?php
class UserAction
{
  public static function SignUp()
  {
    if(($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)))
    {
      return UserLogic::SignUp();
    }
  }

    public static function SignIn()
    {
      if(($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)))
      {
        return UserLogic::SignIn();
      }
    }

}
