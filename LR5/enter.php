<?php session_start();
if (isset($_SESSION['user'])) {
  echo "<label style=' font-family: sans-serif; font-size: 20; text-align: center;'>Вы уже авторизованы как: " . $_SESSION['user']['login'] . " </label><br> 
    <a style='color: #e2501e; outline: none; text-decoration: none; font-family: sans-serif;' href='Logic/logout.php'>Выход</a>";
  return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Авторизация</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <!--для смартфонов-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!--JSS + Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
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
        <a class="nav-link" href="/LR5sai/enter.php" tabindex="-1" aria-disabled="true">Войти</a>
        <a class="nav-link" href="/LR5sai/register.php" tabindex="-1" aria-disabled="true">Регистрация</a>
      </div>
    </div>
  </nav>



  <div class="container-lg">
    <div class="row">
      <div class="col">

        <div class="Images">
          <img src="../LR2WEB1/img/1.jpg" href="http://localhost:8080/LR2WEB/input2.html" alt="img-thumbnail">
        </div>



        <div class="btn-group">
          <button type="button" class="btn btn-natural dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link " href="http://localhost:8080/LR5sai/LR5.php">Поиск в архиве</a>
            <a class="nav-link" href="#">Памятники из гранита ˅</a>
            <a class="nav-link" href="#">Виды памятников ˅</a>
            <a class="nav-link" href="#">По цвету ˅</a>
            <a class="nav-link" href="#">Мемориальные комплексы</a>
            <a class="nav-link" href="#">Благоустройство ˅</a>
          </nav>
        </div>
      </div>
    </div>

    <div class="row rows mb-3">
      <div class="col text-center" style="margin-top: 10px; margin-bottom: -40px">
        <?php if (isset($_SESSION['message'])) {
          echo '<p >' . $_SESSION['message'] . '</p>';
          unset($_SESSION['message']);
        } ?>
      </div>
    </div>
    <br>
    <div class="row rows justify-content-center mb-3">
      <div class="col text-center">
        <form action="Logic/enter_logic.php" method="POST">
          <div class="row rows mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="login" placeholder="Введите свой логин">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password" placeholder="Введите свой пароль">
            </div>
          </div>
          <button type="submit" class="btn btn-light">Войти</button>
          <p>
            У вас нет аккаунта? <a
              style="color: #2c75ff; outline: none; text-decoration: none; font-family: sans-serif;"
              href="/LR5sai/register.php">Зарегистрируйтесь</a>
          </p>
        </form>
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

</body>

</html>