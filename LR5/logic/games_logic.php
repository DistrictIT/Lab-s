<?php

if(!isset($_SESSION['user']))
{
	echo "У вас нет прав доступа к данной странице <br><a href='index.php'>Выход</a>";
    return;
}

require_once 'core/index.php';
require_once 'Actions/GameAction.php';

$action = new GameActions();


if(isset($_POST['add']))
{
	$message=$action->addGame();
}

if(isset($_POST['edit']))
{
	$message=$action->updateGame();
}

if(isset($_POST['delete']))
{
	$action->deleteGame();
}

$items = $action->gameAction();
$genres = $action->genreAction();
