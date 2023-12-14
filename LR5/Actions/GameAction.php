<?php

class GameActions
{
	function gameAction()
	{

				$sql ="";
				$namefilter='';
				$genrefilter='';
				$priceF='';
				$priceT='';
				$descfilter='';

				if(isset($_GET['gameNamefilter']))
				{
					$namefilter = $_GET['gameNamefilter'];
				}

				if(isset($_GET['genreFilter']))
				{
					if($_GET['genreFilter'] !== "Нет")
					{
						$genrefilter = $_GET['genreFilter'];
					}
				}

				if(isset($_GET['priceFrom']))
				{
					$priceF=$_GET['priceFrom'];
				}

				if(isset($_GET['descFilter']))
				{
					$descfilter= $_GET['descFilter'];
				}

				if(isset($_GET['priceTo']))
				{
					$priceT=$_GET['priceTo'];
				}

				$game_table = new Games_table();
				return $game_table->get_games($namefilter,$genrefilter,$priceF,$priceT,$descfilter);
	}

	function genreAction()
	{
		$genre_table = new Genres_table();
		return $genre_table->get_genres();
	}

	function addGame()
	{

	$game_table = new Games_table();
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST))
		{
			$image_path='';
			if(isset($_POST['gameName']) && isset($_POST['genre']) && $_POST['genre'] !== "Нет" && $_POST['genre'] >0 && $_POST['genre'] <100000
			 && isset($_POST['price']) && isset($_POST['desc'] )
			 && isset($_FILES['image']) && $_FILES['image']['tmp_name'] !== '')
			{
				if(exif_imagetype($_FILES['image']['tmp_name']) !== false)
				{
					$image_path = "img/".$_FILES['image']['name'];
					$path = pathinfo($image_path);

					if(!is_dir("../img/"))
					{
						mkdir("../img/");
						$counter=0;
						while(is_file($image_path))
						{
							$counter++;
							$image_path = "img/".$path['filename']."(".$counter.").".$path['extension'];
						}
						move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
					}

					$price = (int)$_POST['price'];
					$game_table->add_game($image_path,strip_tags($_POST['gameName']),strip_tags($_POST['genre']),strip_tags($_POST['desc']),$price);
				}
				else
				{
					return "Выбранный файл не является изображением";
				}
			}
			else
			{
				return "Вы не заполнили одно из полей";
			}
		}
	}


	function updateGame()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST))
		{
			if(isset($_POST['gameName']) &&$_POST['gameName'] !=='' && isset($_POST['genre']) && $_POST['genre'] !== "Нет" && $_POST['genre'] >0 && $_POST['genre'] <1000000
			 	&& isset($_POST['price']) && isset($_POST['desc']))
			{
				$image_path='';
				$game_table = new Games_table();

				if(isset($_FILES['image']) && $_FILES['image']['tmp_name'] !== '')
				{
					if(exif_imagetype($_FILES['image']['tmp_name']) !==false)
					{
						$image_path = "img/".$_FILES['image']['name'];
						$path = pathinfo($image_path);

						if(!is_dir("../img/"))
						{
							mkdir("../img/");
							$counter=0;
							while(is_file($image_path))
							{
								$counter++;
								$image_path = "img/".$path['filename']."(".$counter.").".$path['extension'];
							}
							move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
						}
					}
					else
					{
						return "Выбранный файл не является изображением";
					}
				}

				$game_table->update_game($_POST['id'], $image_path, strip_tags($_POST['gameName']),strip_tags($_POST['genre']),strip_tags($_POST['desc']),$_POST['price']);
			}
			else
			{
				return "Вы не заполнили одно из полей";
			}
		}

	}

	function deleteGame()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST))
		{
			$game_table = new Games_table();
			$game_table->delete_game($_POST['id']);
		}
	}
}
