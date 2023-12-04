<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'user';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Купить памятники Памятник №010 из красного гранита по выгодной цене в Волгограде</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse show" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="#">Наши работы</a>
                <a class="nav-link" href="#">Опт</a>
                <a class="nav-link" href="#">Как заказать</a>
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Отзывы</a>
            </div>

            <div class="Twonavbar-nav">
                <?=$_SESSION['user']['login']?>
                <a class="nav-link" href="http://localhost/LR3WEB/Logic/logout.php" tabindex="-1" aria-disabled="true">Выход</a>

            </div>

        </div>
    </nav>

    
    <div class="container-lg">
        <div class="row">
            <div class="col">

                <div class="Images">
                    <img src="http://localhost/LR3WEB/img/1.jpg" href="#" alt="img-thumbnail">
                </div>



                <div class="btn-group">
                    <button type="button" class="btn btn-natural dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ваш город?
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <h6 class="dropdown-header">Выберете город?</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">Волгоград</a></li>
                        <li><a class="dropdown-item" href="#">Сталинград</a></li>
                        <li><a class="dropdown-item" href="#">Царицин</a></li>
                    </ul>
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
                        <a class="nav-link " href="http://localhost/LR3WEB/LR2.php">Поиск в архиве</a>
                        <a class="nav-link" href="#">Памятники из гранита ˅</a>
                        <a class="nav-link" href="#">Виды памятников ˅</a>
                        <a class="nav-link" href="#">По цвету ˅</a>
                        <a class="nav-link" href="#">Мемориальные комплексы</a>
                        <a class="nav-link" href="#">Благоустройство ˅</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="tivirp p-3 mb-2 bg-light text-dark ">
                    <H2><b>Памятник №010 из красного гранита</b></H2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <img src="http://localhost/LR3WEB/img/2.jpg" class="img-fluid w-50 align-items-start"
                                alt="card-horizontal-image">
                        </div>
                        <div class="col-7 col-sm-8">
                            <div class="card-body">
                                <h6 class="card-title">Размер:</h6>

                                <div class="button-visov2">
                                    <button type="button" class="btn btn-primary">1000 Х 450 Х 50</button>
                                </div>

                                <p>
                                <h6 class="card-title">Страна производства:</h6>

                                <div class="button-visov2">
                                    <button type="button" class="btn btn-primary">Китай</button>
                                </div>
                                </p>

                                <h6 class="card-title">Полировка стеллы:</h6>

                                <p></p>
                                <div class="button-visov2">
                                    <button type="button" class="btn btn-primary">5-сторонняя</button>
                                </div>
                                </p>

                                <h6 class="card-title2">Доставка в г.Волгоград:</h6>
                                <h6 class="card-title3">Вы можете самостоятельно забрать памятник по адресам:</h6>
                                <div class="button-visov3">
                                    <button type="button" class="btn btn-primary">Авиаторов, 17 А</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">

            <div class="col-sm-4">
                <img src="http://localhost/LR3WEB/img/3.jpg" class="img-thumbnail" alt="img-thumbnail">
            </div>

            <div class="col-sm-4">
                <img src="http://localhost/LR3WEB/img/4.jpg" class="img-thumbnail" alt="img-thumbnail">
            </div>

            <div class="col-sm-3">
                <img src="http://localhost/LR3WEB/img/5.jpg" class="img-thumbnail" alt="img-thumbnail">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2 class="pochti_konec">Характеристики:</h2>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="hochu_spat">Размер памятника,
                        мм-----------------------------------------------------------------------------
                        1000X450X50</h5>
                    <h5 class="hochu_spat">Размер тумбы,
                        мм---------------------------------------------------------------------------------
                        500X150X150</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2 class="pochti_konec1">Услуги</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="button-visov4">
                    <button type="button" class="btn btn-outline-primary"><b>Скидка 30%</b><br>
                        на памятники из гранита</button>
                </div>
            </div>
            <div class="col">
                <div class="button-visov4">
                    <button type="button" class="btn btn-outline-primary"><b>Уникальное художественное
                            оформление</b><br>
                        из более чем 1800 изображений</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="tivirp2 p-5 xl bg-light text-dark">
                    <div class="col">
                        <h6>2023 © ИП Билан Д.Ю.<br>
                            Изготовление памятников в Волгограде</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="vse">
            <div class="row">
                <div class="col-md-auto">
                    <h6>Покупателям</h6>
                    <ul>
                        <li><a href="#">Как сделать заказ</a></li>
                        <Li><a href="#">Доставка</a></Li>
                        <Li><a href="#">Установка памятника</a></Li>
                        <Li><a href="#">Публичная оферта</a></Li>
                        <Li><a href="#">Вопросы и ответы</a></Li>
                    </ul>
                </div>

                <div class="col-md-auto">
                    <h6>Компания</h6>
                    <ul>
                        <li><a href="#">О нас</a></li>
                        <Li><a href="#">Наше производство</a></Li>
                        <Li><a href="#">Новости</a></Li>
                        <Li><a href="#">Реквизиты</a></Li>
                        <Li><a href="#">Контакты</a></Li>
                    </ul>
                </div>

                <div class="col-md-auto">
                    <h6>Партнерам</h6>
                    <ul>
                        <li><a href="#">Опт</a></li>
                        <Li><a href="#">Производство памятников<br>
                                для ритуального бизнеса</a></Li>
                    </ul>
                </div>

                <div class="col-md-auto">
                    <div class="dropdown3">
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>