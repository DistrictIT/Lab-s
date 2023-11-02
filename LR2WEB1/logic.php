<?php
require_once 'core/index.php';

$web2 =  Web2_database::getInstance();

$games_table = new table1();
$genres_table = new Genres_table();
$items = $games_table->get_tables1($web2->getDB());
$genres = $genres_table->get_tables2($web2->getDB());
