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
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">🔒Войти</a>
            </div>
        </div>
    </nav>



    <div class="container-lg">
        <div class="row">
            <div class="col">

                <div class="Images">
                    <img src="http://localhost/LR2WEB/Images/1.jpg" href="#" alt="img-thumbnail">
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
                        <a class="nav-link" href="http://localhost/LR2WEB/index2.html">По цвету ˅</a>
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
    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <?php
    // Database connection
    $servername = "127.0.0.1";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "pohorony";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission and filter data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selected_plot = $_POST['plot'];
        $selected_people = $_POST['people'];
        $selected_name = $_POST['name'];
        $selected_date = $_POST['date'];

        // Build the SQL query based on selected filters
        $sql = "SELECT information.photo, information.name, information.date, information.plot, information.number_people FROM information 
        JOIN pohorony ON information.plot = pohorony.plot WHERE 1=1";

        if (!empty($selected_plot)) {
            $sql .= " AND information.plot = $selected_plot";
        }

        if (!empty($selected_people)) {
            $sql .= " AND information.number_people = $selected_people";
        }

        if (!empty($selected_name)) {
            $sql .= " AND information.name LIKE '%$selected_name%'";
        }

        if (!empty($selected_date)) {
            $sql .= " AND information.date = '$selected_date'";
        }

        $result = $conn->query($sql);
    } else {
        // If the form is not submitted, fetch all data
        $sql = "SELECT information.photo, information.name, information.date, information.plot, information.number_people FROM information 
        JOIN pohorony ON information.plot = pohorony.plot";
        $result = $conn->query($sql);
    }

    // Output the filter form
    echo '
    <form method="POST" action="">
        <div class="form-row">
            <div class="col-md-2">
                <label for="plot">Участок:</label>
                <select name="plot" id="plot" class="form-control">
                    <option value="">Все</option>';
                    
                    for ($i = 1; $i <= 20; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }

                    echo '
                </select>
            </div>
            <div class="col-md-2">
                <label for="people">Количество людей:</label>
                <input type="number" name="people" id="people" min="0" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="name">ФИО:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="date">Дата:</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Применить фильтр</button>
            </div>
            <div class="col-md-2">
                <a href="LR2.php" class="btn btn-secondary mt-4">Очистить фильтр</a>
            </div>
        </div>
    </form>
    ';

    // Output the table using Bootstrap styles
    if ($result->num_rows > 0) {
        echo "<table class='table mt-4'>";
        echo "<thead class='thead-light'>
            <tr>
            <th>Фото</th>
            <th>ФИО</th>
            <th>Дата</th>
            <th>Участок</th>
            <th>Количество людей</th>
            </tr>
        </thead>
        <tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='" . $row["photo"] . "' alt='" . $row["name"] . "'></td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["plot"] . "</td>";
            echo "<td>" . $row["number_people"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<div class='mt-4 alert alert-info'>0 результатов</div>";
    }

    // Close the connection
    $conn->close();
    ?>
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
    
</body>

</html>
