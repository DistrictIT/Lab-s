<!-- Блок авторизационной информации -->
<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['USER_ID'])) {
    echo 'Вы вошли как  ' . $_SESSION['USER_NAME'] . '  <a href="/LR5/pages/logout.php">&nbsp;Выйти</a>';
} else {
    echo 'Вы не авторизованы. <a href="/LR5/pages/login.php"> Ввести логин и пароль </a> или <a href="/LR5/pages/register.php"> зарегистрироваться</a>';
}

?>
<header>
    <style>
        .navbar-nav {
            position: relative;
            top: 0px;
            left: 90px;
            right: 0px;
            bottom: 0px;

        }

        .Twonavbar-nav {
            position: relative;
            top: 0px;
            left: 900px;
            right: 0px;
            bottom: 0px;
        }

        .Images {
            position: relative;
            top: 33px;
            left: 0px;
            right: 0px;
            bottom: 0px;
        }

        .button-visov22 {

            position: relative;
            top: -6px;
            left: 250px;
            right: 0px;
            bottom: 0px;
        }

        .input-group {
            position: relative;
            top: -42px;
            left: 450px;
            right: 0px;
            bottom: 0px;
            z-index: 1;
        }

        .dropdown {
            position: relative;
            top: -105px;
            left: 800px;
            right: 0px;
            bottom: 0px;
        }

        .button-visov {
            position: relative;
            top: -160px;
            left: 1050px;
            right: 0px;
            bottom: 0px;

        }

        .Fornavbar {
            position: relative;
            top: -110px;
            left: 0px;
            right: 0px;
            bottom: 0px;
        }

        .dropdown2 {
            position: relative;
            top: -115px;
            left: 0px;
            right: 0px;
            bottom: 0px;
        }

        .tivirp {
            position: relative;
            top: -40px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            text-align: center;

        }

        .card {
            position: relative;
            top: -20px;
            left: 0px;
            right: 0px;
            bottom: 0px;
        }

        .card-title2 {
            text-align: center;
        }

        .card-title3 {
            text-align: center;
        }

        .button-visov3 {
            position: relative;
            top: 7px;
            left: 280px;
            right: 0px;
            bottom: 0px;
        }

        .pochti_konec {
            position: relative;
            top: 30px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            text-align: center;

        }

        .hochu_spat {
            position: relative;
            top: 70px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            text-align: center;

        }

        .pochti_konec1 {
            position: relative;
            top: 70px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            text-align: center;

        }

        .button-visov4 {
            position: relative;
            top: 120px;
            left: 170px;
            right: 0px;
            bottom: 0px;
        }

        .tivirp2 {
            position: relative;
            top: 400px;
            left: -70px;
            right: 0px;
            bottom: 50px;
        }

        .vse {
            position: relative;
            top: 255px;
            left: 250px;
            right: 0px;
            bottom: 20px;
        }

        .dropdown3 {
            position: relative;
            top: 0px;
            left: -7px;
            right: 0px;
            bottom: 20px;
        }

        a {

            color: black;
        }
    </style>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse show" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="#">Наши работы</a>
                <a class="nav-link" href="#">Опт</a>
                <a class="nav-link" href="#">Как заказать</a>
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Отзывы</a>
            </div>


        </div>
    </nav>
    <div class="container-lg">
        <div class="row">

            <div class="col">
                <a href="/LR5" class="Images">
                    <img src="/LR5/inc/img/1.jpg" alt="logo">
                </a>
            </div>

            <div class="button-visov22">
                <button type="button" class="btn btn-light">Ваш город?</button>
            </div>

            <div class="d-flex flex-wrap align-items-start">
                <div class="w-25">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Поиск" aria-label="Username"
                            aria-describedby="input-group-right">
                        <span class="input-group-text" id="input-group-right-example">🔍</span>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-natural dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <b>☎ 8 (383) 383-03-92<br /></b>
                    Пн-Вс с 9:00 до 21:00<br />
                    sales@bilkam.ru
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#"> <b>8 (800) 333 37 32</b></a></li>
                </ul>
            </div>

            <div class="button-visov">
                <button type="button" class="btn btn-outline-primary">Заказать звонок</button>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="Fornavbar" style="color: black;">
                <nav class="nav nav-pills nav-fill" style="background-color: #f5f5f5fd">
                    <a class="nav-link " href="/LR5/pages/employees.php">Поиск в архиве</a>
                    <a class="nav-link" href="#">Памятники из гранита ˅</a>
                    <a class="nav-link" href="#">Виды памятников ˅</a>
                    <a class="nav-link" href="#">По цвету ˅</a>
                    <a class="nav-link" href="#">Мемориальные комплексы</a>
                    <a class="nav-link" href="#">Благоустройство ˅</a>
                </nav>
            </div>
        </div>
    </div>
    </div>
</header>