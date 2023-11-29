<?php

session_start();
require_once 'logic.php';
if (!isset($_SESSION['user'])) {


    echo "У вас нет прав доступа к данной странице <br><a href='../LR3WEB/enter.php'>Войти</a>";
    return;
}
?>

<!DOCTYPE html>
<html lang="ru">

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
                <?= $_SESSION['user']['login'] ?>
                <a class="nav-link" href="http://localhost/LR3WEB/Logic/logout.php" tabindex="-1"
                    aria-disabled="true">Выход</a>
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
                        <a class="nav-link" href="#">Поиск в архиве</a>
                        <a class="nav-link" href="#">Памятники из гранита ˅</a>
                        <a class="nav-link" href="#">Виды памятников ˅</a>
                        <a class="nav-link" href="http://localhost/LR3WEB/index3.php">По цвету ˅</a>
                        <a class="nav-link" href="#">Мемориальные комплексы</a>
                        <a class="nav-link" href="#">Благоустройство ˅</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="tivirp p-3 mb-2 bg-light text-dark ">
                    <H2><b>Параметры поиска</b></H2>
                </div>
            </div>
        </div>

        <!--  ///////////////////////////////////////////////////////////////////// -->
        <div class="row text-center rows">
            <div class="col">
                <form>
                    <div class="form-group mt-2">
                        <label for="gameNamefilter">Фильтр по имени</label>
                        <input class="form-control" name="gameNamefilter" placeholder="Введите ФИО усопшего" value="<?php if (isset($_GET['gameNamefilter']))
                            echo htmlspecialchars($_GET['gameNamefilter']); ?>">
                    </div>

                    <div class="form-group mt-2">
                        <label for="peoplefilter">Фильтр по количеству людей</label>
                        <input class="form-control" name="peoplefilter" placeholder="Введите количество людей" value="<?php if (isset($_GET['peoplefilter']))
                            echo htmlspecialchars($_GET['peoplefilter']); ?>">
                    </div>


                    <div class="form-group mt-2">
                        <label for="genreFilter">Фильтрация по участку</label>
                        <select class="form-select" name="genreFilter">
                            <option></option>

                            <?php foreach ($genres as $genre): ?>
                                <option <?php if (isset($_GET["genreFilter"]) && $genre["plot"] == $_GET["genreFilter"]) { ?>selected<?php } else {
                                } ?>>
                                    <?php echo htmlspecialchars($genre['plot']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                    </div>

                    <br>
                    <button class="btn btn-light btn-lg fs-6 " type="submit">Найти</button>
                    <button class="btn btn-light btn-lg fs-6 " type="button" name="resetButton"
                        onclick="resetForm()">Сбросить</button>
                </form>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Изображение</th>
                                <th>ФИО</th>
                                <th>Участок</th>
                                <th>Дата</th>
                                <th>Количество людей</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td> <img src="<?php echo $item['photo']; ?>" style="width: 150px;height: 200px;">

                                    </td>
                                    <td>
                                        <?php echo $item['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['plot'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['date'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['number_people'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <!--///////////////////////////////////////////////////////////////////////////// -->
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

        <script type="text/javascript">
            function resetForm() {
                window.location = window.location.href.split("?")[0];
            }

        </script>
</body>

</html>