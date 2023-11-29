<?php
session_start();
require_once '../core/index.php';

$web3 =  Web2_database::getInstance();
$Users = new Users_table();
$Users->register($web3->getDB());
