<?php

class UserLogic
{
  public  function SignUp($database)
  {
    $backflag=false;
		$errors['message']="";
		if (isset($_POST['fio']) && $_POST['fio']!=='')
		{
			$errors['register']['fio'] =$_POST['fio'];
			$this->fio = mysqli_real_escape_string($database,$_POST['fio']);
		}
		else
		{
			$errors['message'] .=' ФИО не введено <br>';
			$backflag=true;
		}

		if (isset($_POST['birthday']) && $_POST['birthday']!=='')
		{
			$errors['register']['birthday']=$_POST['birthday'];
			$this->birthday = mysqli_real_escape_string($database,$_POST['birthday']);
		}
		else
		{
			$errors['message'] .=' День рождения не вверен <br>';
			$backflag=true;
		}

		if (isset($_POST['pol']) && $_POST['pol']!=='')
		{
			$errors['register']['pol']=$_POST['pol'];
			$this->pol = mysqli_real_escape_string($database,$_POST['pol']);
		}
		else
		{
			$errors['message'] .=' Пол не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['blood_type']) && $_POST['blood_type']!=='')
		{
			$errors['register']['blood_type']=$_POST['blood_type'];
			$this->blood_type = mysqli_real_escape_string($database,$_POST['blood_type']);
		}
		else
		{
			$errors['message'] .=' Тип крови не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['rezus_factor']) && $_POST['rezus_factor']!=='')
		{
			$errors['register']['rezus_factor']=$_POST['rezus_factor'];
			$this->rezus_factor = mysqli_real_escape_string($database,$_POST['rezus_factor']);
		}
		else
		{
			$errors['message'] .=' Резус фактор не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['interests']) && $_POST['interests']!=='')
		{
			$errors['register']['interests']=$_POST['interests'];
			$this->interests = mysqli_real_escape_string($database,$_POST['interests']);
		}
		else
		{
			$errors['message'] .=' Интересы не указаны <br>';
			$backflag=true;
		}

		if (isset($_POST['address']) && $_POST['address']!=='')
		{
			$errors['register']['address']=$_POST['address'];
			$this->address = mysqli_real_escape_string($database, $_POST['address']);
		}
		else
		{
			$errors['message'] .=' Адрес не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['profile_vk']) && $_POST['profile_vk']!=='')
		{
			$errors['register']['profile_vk']=$_POST['profile_vk'];
			$this->profile_vk =mysqli_real_escape_string($database, $_POST['profile_vk']);
		}
		else
		{
			$errors['message'] .=' Профиль в ВК не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['login']) && $_POST['login'] !=='')
		{
			$_SESSION['register']['login']=$_POST['login'];
			$login = mysqli_real_escape_string($database,$_POST['login']);
			Users_table::user_check($database,$login);
			$this->login = $login;
		}
		else
		{
			$errors['message'] .=' Логин не введен <br>';
			$backflag=true;
		}


		if(isset($_POST['password']) && isset($_POST['password2']) && preg_match_all("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$/", $_POST['password']))
		{
			if($_POST['password'] == $_POST['password2'])
			{

				$this->password = mysqli_real_escape_string($database,md5($_POST['password']));
			}
			else
			{
				$errors['message'] .=' Пароли не совпадают <br>';
				$backflag=true;
			}
		}
		else
		{
			$errors['message'] .=' Пароль не соответсвует требованиям <br>';
			$backflag=true;
		}

		if($backflag===true)
		{
			return $errors;
		}

		unset($errors['register']);
		Users_table::add_user($database, $_POST['login'], mysqli_real_escape_string($database,md5($_POST['password'])), $_POST['fio'], $_POST['birthday'], $_POST['pol'], $_POST['blood_type'],$_POST['rezus_factor'], $_POST['interests'], $_POST['address'],$_POST['profile_vk'], );
		return $errors;
  }

  public static function SignIn()
  {
    $web3 = Web2_database::getInstance();
    $Users = new Users_table();
    return $Users->enter($web3->getDB());
  }

  public static function logout()
  {
    unset($_SESSION['user']);
    header('Location: ../index2.php');
  }
}