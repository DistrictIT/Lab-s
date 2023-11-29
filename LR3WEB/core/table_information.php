<?php
class table_information
{
    public function get_tables1($database)
    {
        $sql = "SELECT information.photo, information.name, information.plot, information.date, information.number_people FROM information JOIN pohorony ON pohorony.id = information.id";

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
            if (isset($_GET['gameNamefilter'])) {
                $gamefil = mysqli_real_escape_string($database, $_GET['gameNamefilter']);
                $sql = $sql . " and information.name LIKE '%" . $gamefil . "%' ";
            }

            if (isset($_GET['peoplefilter'])) {
                $peoplefil = mysqli_real_escape_string($database, $_GET['peoplefilter']);
                $sql =$sql . " and information.number_people LIKE '%" . $peoplefil . "%' ";
            }

            if (isset($_GET['genreFilter'])) {
                $plotFilter = mysqli_real_escape_string($database, $_GET['genreFilter']);
                $sql = $sql . " and information.plot LIKE '%" . $plotFilter . "%' ";
            }
        }


        $result = mysqli_query($database, $sql);
        $games = mysqli_fetch_all($result, 1);
        return $games;
    }
}
