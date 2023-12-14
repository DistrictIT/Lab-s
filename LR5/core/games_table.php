<?php
class Games_table
{
	public function get_games($namefilter,$genrefilter,$priceF,$priceT,$descfilter)
	{

		$web2 =  Web2_database::getInstance();
		$database= $web2->getDB();
		$namefilter = mysqli_real_escape_string($database, $namefilter);
		$genrefilter = mysqli_real_escape_string($database, $genrefilter);
		$priceF = mysqli_real_escape_string($database, $priceF);
		$priceT = mysqli_real_escape_string($database, $priceT);
		$descfilter = mysqli_real_escape_string($database, $descfilter);

		$sql = "SELECT games.`id`, games.`img_path`, games.`name`, genres.name as
		`genre_name`, games.`description`, games.`cost` FROM `games` join genres on genres.id = games.id_genre WHERE 1  ";

		if($namefilter !='')
		{
			$sql = $sql . " and games.`name` like '%" .$namefilter."%' ";
		}
		if($genrefilter !== '')
		{
			$sql = $sql . " and genres.name = '".$genrefilter."' ";
		}
		if($priceF !='')
		{
			$sql = $sql . " and games.cost > " . $priceF ;
		}
		if($priceT !='')
		{
			$sql = $sql . " and games.cost < ". $priceT;
		}
		if($descfilter !='')
		{
			$sql = $sql . " and games.description like '%".$descfilter."%' ";
		}


		$result = mysqli_query($database,$sql);
		if ($result && mysqli_num_rows($result) > 0) {
			$games = mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			$games = array();
		}
		
		return $games;
	}

	public function add_game(string $image_path,string $name,int $id_genre,string $desc,int $price)
	{
		$web2 =  Web2_database::getInstance();
		$database= $web2->getDB();
		$image_path = mysqli_real_escape_string($database,$image_path);
		$name = mysqli_real_escape_string($database,$name);
		$desc= mysqli_real_escape_string($database,$desc);
		$id_genre= mysqli_real_escape_string($database,$id_genre);
		$price =(int)$price;

		if(!is_dir("../img/"))
		{
			mkdir("../img/");
		}
		$sql = "INSERT INTO `games`(`img_path`, `name`, `id_genre`, `description`, `cost`) VALUES ('".$image_path."','".$name."','".$id_genre."','".$desc."','".$price."')";
		mysqli_query($database,$sql);

	}
	public function update_game(int $id,string $image_path,string $name,int $id_genre,string $desc,int $price)
	{

		$web2 =  Web2_database::getInstance();
		$database= $web2->getDB();

		if(!is_dir("../img/"))
		{
			mkdir("../img/");
		}
		$id = mysqli_real_escape_string($database,$id);
		$name = mysqli_real_escape_string($database,$name);
		$desc= mysqli_real_escape_string($database,$desc);
		$id_genre= mysqli_real_escape_string($database,$id_genre);
		$price =(int)$price;

		$sql = "UPDATE `games` SET `name`='".$name."',`id_genre`='".$id_genre."',`description`='".$desc."',`cost`='".$price."' ";
		if($image_path !=='')
		{
			$image_path = mysqli_real_escape_string($database,$image_path);
			$sql .=", `img_path`='".$image_path."' ";
		}

		$sql .= " WHERE `id` =".$id;
		mysqli_query($database,$sql);

	}

	public function delete_game(int $id)
	{
		$web2 =  Web2_database::getInstance();
		$database= $web2->getDB();
		$id = mysqli_real_escape_string($database,$id);
		$sql = "DELETE FROM `games` WHERE `id`=".$id;
		mysqli_query($database,$sql);

	}
}
