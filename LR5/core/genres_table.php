<?php

class Genres_table
{
	public function get_genres()
	{
		$sql = "SELECT `id`,`name` FROM `genres` ";

		$web2 =  Web2_database::getInstance();
		$database =$web2->getDB();

		$result = mysqli_query($database,$sql);

		if ($result && mysqli_num_rows($result) > 0) {
			$genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			$genres = array();
		}
		
		return $genres;

	}

}
