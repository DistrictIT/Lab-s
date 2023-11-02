<?php

class Core
{
	public $database;
	public function __construct()
	{
		require_once 'config.php';
		require_once 'web2_database.php';
	}
}
