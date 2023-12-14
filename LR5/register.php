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
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <!--для смартфонов-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Регистрация</title>
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
      <div class="col text-center">
        <?php if (isset($_SESSION['message'])) {
          echo '<p>' . $_SESSION['message'] . '</p>';
          unset($_SESSION['message']);
        } ?>
      </div>
    </div>
    <div class="row rows justify-content-center" style="margin-top: 20px">
      <div class="col text-center">
        <form action="Logic/register_logic.php" method="POST">
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">ФИО</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="fio" placeholder="Введите свое ФИО" value="<?php
              if (isset($_SESSION['register']['fio'])) {
                echo $_SESSION['register']['fio'];
                unset($_SESSION['register']['fio']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="birthday" class="col-sm-2 col-form-label">Дата рождения</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="birthday" placeholder="Введите дату рождения" value="<?php
              if (isset($_SESSION['register']['birthday'])) {
                echo $_SESSION['register']['birthday'];
                unset($_SESSION['register']['birthday']);
              } ?>">
            </div>
          </div>

          <div class="row rows mb-3">
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Пол</legend>
                <div class="col-sm-8">
                  <div class="form-check text-lg-start">
                    <input class="form-check-input" type="radio" name="pol" id="gridRadios1" value="Муж" <?php
                    if (isset($_SESSION['register']['pol']) && $_SESSION['register']['pol'] === "Муж") {
                      echo "checked";
                    } ?>>
                    <label class="form-check-label" for="gridRadios1">
                      Муж
                    </label>
                  </div>
                  <div class="form-check text-lg-start">
                    <input class="form-check-input" type="radio" name="pol" id="gridRadios2" value="Жен" <?php
                    if (isset($_SESSION['register']['pol']) && $_SESSION['register']['pol'] === "Жен") {
                      echo "checked";
                    }
                    unset($_SESSION['register']['pol']); ?>>
                    <label class="form-check-label" for="gridRadios2">
                      Жен
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Группа крови</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="blood_type" placeholder="Введите свою группу крови" value="<?php
              if (isset($_SESSION['register']['blood_type'])) {
                echo $_SESSION['register']['blood_type'];
                unset($_SESSION['register']['blood_type']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Резус фактор</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="rezus_factor" placeholder="Введите свой резус фактор" value="<?php
              if (isset($_SESSION['register']['rezus_factor'])) {
                echo $_SESSION['register']['rezus_factor'];
                unset($_SESSION['register']['rezus_factor']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Интересы</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" name="interests" placeholder="Введите то, чем вы увлекаетесь"><?php
              if (isset($_SESSION['register']['interests'])) {
                echo $_SESSION['register']['interests'];
                unset($_SESSION['register']['interests']);
              } ?></textarea>
            </div>
          </div>

          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Адрес</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="address" placeholder="Введите свой адрес проживания" value="<?php
              if (isset($_SESSION['register']['address'])) {
                echo $_SESSION['register']['address'];
                unset($_SESSION['register']['address']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Ссылка на профиль ВК</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="profile_vk" placeholder="Введите ссылку на свой профиль ВК"
                value="<?php
                if (isset($_SESSION['register']['profile_vk'])) {
                  echo $_SESSION['register']['profile_vk'];
                  unset($_SESSION['register']['profile_vk']);
                } ?>">
            </div>
          </div>

          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="login" placeholder="Введите свой логин" value="<?php
              if (isset($_SESSION['register']['login'])) {
                echo $_SESSION['register']['login'];
                unset($_SESSION['register']['login']);
              } ?>">
            </div>
          </div>
          <label for="inputEmail" class="col-sm-2 col-form-label">Пароль должен содержать буквы латинского алфавита,
            цифры
            прописные и строчные,не меньше 6 символов</label>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password" placeholder="Введите пароль"
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Подтверждение пароля</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password2" placeholder="Подтвердите пароль"
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$">
            </div>
          </div>


          <button type="submit" class="btn btn-light">Подтвердить</button>
          <p>
            У вас есть аккаунт? - <a
              style="color: #2c75ff; outline: none; text-decoration: none; font-family: sans-serif;"
              href="/LR5sai/enter.php">Авторизируйтесь</a>
          </p>

      </div>

      </form>
    </div>
  </div>

  

</body>

</html>