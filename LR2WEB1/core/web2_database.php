<?php

class Web2_database
{
	private static $instance=null;
	private $host;
	private $username;
	private $password;
	private $dbname;
	private function __clone() {}
	public function __wakeup() {}
	private $database;

	private function __construct()
	{
		require_once 'config.php';
		$this->setParam($db);
		$this->database = $this->openConnection();
	}

	public function getDB()
	{
		return $this->database;
	}

	public static function getInstance()
	{
		return self::$instance === null ? self::$instance = new static() : self::$instance;
	}

	public function setParam($db)
	{
		$this->host=$db['host'];
		$this->username=$db['username'];
		$this->password=$db['password'];
		$this->dbname=$db['dbname'];
	}


	public  function openConnection()
	{
		$link = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
		if(mysqli_connect_errno())
		{
			echo 'Ошибка подключения к бд ('.mysqli_connect_errno().'):'.mysqli_connect_error();
			exit();
		}
		return $link;
	}
}
