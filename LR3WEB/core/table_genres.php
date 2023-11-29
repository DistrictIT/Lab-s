<?php

class Genres_table
{

	public function get_tables2($database)
	{
		$sql = "SELECT `plot` FROM information ";

		$result = mysqli_query($database,$sql);

		$genres =mysqli_fetch_all($result,1);
		return $genres;
	}

}
