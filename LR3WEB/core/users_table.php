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

	
	public static function user_check($database, $login)
	{

		$sql = "SELECT `login` FROM `users` WHERE `login` = '". $login . "'";

		$result = mysqli_query($database,$sql);

		if($result->num_rows >0)
		{
			$errors['message'] ='Пользователь с таким именем уже существует';
			header("Location: http://localhost/LR3WEB/register.php");
			return;
		}
	}

	public static function add_user($database, $login, $password, $fio, $birthday, $pol, $blood_type, $rezus_factor, $interests, $address, $profile_vk)
	{

		$sql = "INSERT INTO `users`( `login`, `password`, `fio`, `birthday`, `pol`, `blood_type`, `rezus_factor`, `interests`, `address`, `profile_vk`)
			VALUES ('".$login."', '".$password."', '".$fio."', '".$birthday."', '".$pol."', '".$blood_type."',
				'".$rezus_factor."', '".$interests."', '".$address."', '".$profile_vk."')";

		mysqli_query($database, $sql);

		$errors['message'] ='Регистрация успешна';
		header("Location: http://localhost/LR3WEB/enter.php");
	}
    public function enter($database)
    {
        $cur_time = time();
        if (!isset($errors['user_block_time'])) {
            $errors['user_block_time'] = 0;
        }

        if (!isset($errors['trys'])) {
            $errors['trys'] = 0;
        }

        if (isset($errors['user_block_time'])) {
            if ($errors['user_block_time'] >= $cur_time) {
                $errors['message'] = 'Вы заблокированы';
				return $errors;
            } else {
                unset($errors['user_block_time']);
            }
        }

        if (isset($_POST['login']) && $_POST['login'] !== '') {
            $this->login = mysqli_real_escape_string($database, $_POST['login']);
        } else {
            $errors['message'] = 'Логин не введен';
            header("Location: http://localhost/LR3WEB/enter.php");
            return $errors;
        }
        if (isset($_POST['password']) && preg_match_all("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$/", $_POST['password'])) {
            $this->password = mysqli_real_escape_string($database, md5($_POST['password']));
        } else {
            $errors['message'] = 'Неверный пароль';
            header("Location: http://localhost/LR3WEB/enter.php");
            return $errors;
        }

        $sql = "SELECT * FROM `users` WHERE `login`= '" . $this->login . "' AND `password`='" . $this->password . "';";

        $result = mysqli_query($database, $sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "fio" => $user['fio'],
                "birthday" => $user['birthday'],
                "pol" => $user['pol'],
                "blood_type" => $user['blood_type'],
                "rezus_factor" => $user['rezus_factor'],
                "interests" => $user['interests'],
                "address" => $user['address'],
                "profile_vk" => $user['profile_vk']
            ];
            header("Location: http://localhost/LR3WEB/index3.php");
        } else {
            if ($errors['trys'] >= 3) {
                echo 'Вы заблокированы навсегда';
                return $errors;
            } else {
                $errors['trys']++;
                if ($errors['trys'] >= 3) {
                    $errors['user_block_time'] = $cur_time + 60;
                    echo 'Вы заблокированы на 60 минут';
                    return $errors;
                }
            }
            $errors['message'] = 'Неверный логин или пароль';
            header("Location: http://localhost/LR3WEB/enter.php");
            return $errors;
        }
    }
}