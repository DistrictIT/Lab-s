<?php
class Users_table
{
	private $fio;
	private $birthday;
	private $pol;
	private $blood_type;
	private $rezus_factor;
	private $interests;
	private $address;
	private $profile_vk;
	private $login;
	private $password;

	public function register($database)
	{
		$backflag=false;
		$_SESSION['message']="";
		if (isset($_POST['fio']) && $_POST['fio']!=='')
		{
			$_SESSION['register']['fio'] =$_POST['fio'];
			$this->fio = mysqli_real_escape_string($database,$_POST['fio']);
		}
		else
		{
			$_SESSION['message'] .='ФИО не введено <br>';
			$backflag=true;
		}

		if (isset($_POST['birthday']) && $_POST['birthday']!=='')
		{
			$_SESSION['register']['birthday']=$_POST['birthday'];
			$this->birthday = mysqli_real_escape_string($database,$_POST['birthday']);
		}
		else
		{
			$_SESSION['message'] .='День рождения не вверен <br>';
			$backflag=true;
		}

		if (isset($_POST['pol']) && $_POST['pol']!=='')
		{
			$_SESSION['register']['pol']=$_POST['pol'];
			$this->pol = mysqli_real_escape_string($database,$_POST['pol']);
		}
		else
		{
			$_SESSION['message'] .='Пол не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['blood_type']) && $_POST['blood_type']!=='')
		{
			$_SESSION['register']['blood_type']=$_POST['blood_type'];
			$this->blood_type = mysqli_real_escape_string($database,$_POST['blood_type']);
		}
		else
		{
			$_SESSION['message'] .='Тип крови не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['rezus_factor']) && $_POST['rezus_factor']!=='')
		{
			$_SESSION['register']['rezus_factor']=$_POST['rezus_factor'];
			$this->rezus_factor = mysqli_real_escape_string($database,$_POST['rezus_factor']);
		}
		else
		{
			$_SESSION['message'] .='Резус фактор не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['interests']) && $_POST['interests']!=='')
		{
			$_SESSION['register']['interests']=$_POST['interests'];
			$this->interests = mysqli_real_escape_string($database,$_POST['interests']);
		}
		else
		{
			$_SESSION['message'] .='Интересы не указаны <br>';
			$backflag=true;
		}

		if (isset($_POST['address']) && $_POST['address']!=='')
		{
			$_SESSION['register']['address']=$_POST['address'];
			$this->address = mysqli_real_escape_string($database, $_POST['address']);
		}
		else
		{
			$_SESSION['message'] .='Адрес не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['profile_vk']) && $_POST['profile_vk']!=='')
		{
			$_SESSION['register']['profile_vk']=$_POST['profile_vk'];
			$this->profile_vk =mysqli_real_escape_string($database, $_POST['profile_vk']);
		}
		else
		{
			$_SESSION['message'] .='Профиль в ВК не указан <br>';
			$backflag=true;
		}

		if (isset($_POST['login']) && $_POST['login'] !=='')
		{
			$_SESSION['register']['login']=$_POST['login'];
			$login = mysqli_real_escape_string($database,$_POST['login']);
			$this->user_check($database,$login);
			$this->login = $login;
		}
		else
		{
			$_SESSION['message'] .='Логин не введен <br>';
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
				$_SESSION['message'] .='Пароли не совпадают <br>';
				$backflag=true;
			}
		}
		else
		{
			$_SESSION['message'] .='Пароль не соответсвует требованиям <br>';
			$backflag=true;
		}

		if($backflag===true)
		{
			header("Location: http://localhost:8080/weblr5/register.php");
				return;
		}

		unset($_SESSION['register']);
		$this->add_user($database);
	}

	private function user_check($database, $login)
	{

		$sql = "SELECT `login` FROM `users` WHERE `login` = '". $login . "'";

		$result = mysqli_query($database,$sql);

		if($result->num_rows >0)
		{
			$_SESSION['message'] ='Пользователь с таким именем уже существует';
			header("Location: http://localhost:8080/weblr5/register.php");
			return;
		}
	}

	private function add_user($database)
	{

		$sql = "INSERT INTO `users`( `login`, `password`, `fio`, `birthday`, `pol`, `blood_type`, `rezus_factor`, `interests`, `address`, `profile_vk`)
			VALUES ('".$this->login."', '".$this->password."', '".$this->fio."', '".$this->birthday."', '".$this->pol."', '".$this->blood_type."',
				'".$this->rezus_factor."', '".$this->interests."', '".$this->address."', '".$this->profile_vk."')";

		mysqli_query($database, $sql);

		$_SESSION['message'] ='Регистрация успешна';
		header("Location: http://localhost:8080/weblr5/enter.php");
	}

	public function enter($database)
	{
		$cur_time = time();
		if(!isset($_SESSION['user_block_time']))
		{
			$_SESSION['user_block_time']=0;
		}

		if(!isset($_SESSION['trys']))
		{
			$_SESSION['trys']=0;
		}

		if(isset($_SESSION['user_block_time']))
		{
			if($_SESSION['user_block_time'] >=$cur_time)
			{
				echo 'Вы заблокированы';
				return;
			}
			else
			{
				unset($_SESSION['user_block_time']);
			}
		}

		if (isset($_POST['login']) && $_POST['login'] !=='')
		{
			$this->login = mysqli_real_escape_string($database,$_POST['login']);
		}
		else
		{
			$_SESSION['message'] ='Логин не введен';
				header("Location: http://localhost:8080/weblr5/enter.php");
				return;
		}
		if(isset($_POST['password']) && preg_match_all("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$/", $_POST['password']))
		{
				$this->password = mysqli_real_escape_string($database,md5($_POST['password']));
		}
		else
		{
			$_SESSION['message'] ='Неверный пароль';
				header("Location: http://localhost:8080/weblr5/enter.php");
				return;
		}

		$sql="SELECT * FROM `users` WHERE `login`= '".$this->login."' AND `password`='".$this->password."';";

		$result=mysqli_query($database, $sql);

		if($result->num_rows >0)
		{
			$user= $result->fetch_assoc();

			$_SESSION['user']=[
				"id"=>$user['id'],
				"login"=>$user['login'],
				"fio" =>$user['fio'],
				"birthday"=>$user['birthday'],
				"pol"=>$user['pol'],
				"blood_type"=>$user['blood_type'],
				"rezus_factor"=>$user['rezus_factor'],
				"interests"=>$user['interests'],
				"address"=>$user['address'],
				"profile_vk"=>$user['profile_vk']
			];
			header("Location: http://localhost:8080/weblr5/games.php");
		}
		else
		{
			if($_SESSION['trys']>=3)
			{
				echo 'Вы заблокированы';
				return;
			}
			else
			{
				$_SESSION['trys']++;
				if($_SESSION['trys']>=3)
				{
					$_SESSION['user_block_time'] = $cur_time +60;
					echo 'Вы заблокированы';
					return;
				}
			}
			$_SESSION['message'] ='Неверный логин или пароль';
				header("Location: http://localhost:8080/weblr5/enter.php");
				return;
		}
	}
}
