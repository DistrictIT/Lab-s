<?php session_start();
require_once 'core/index.php';
if (isset($_SESSION['user'])) {
  echo "Вы уже авторизованы как " . $_SESSION['user']['login'] . " <br><a href='Logic/logout.php'>Выход</a>";
  return;
}
$Errors = UserAction::SignUp();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Регистрация</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
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

    </div>
  </nav>


  <div class="container-lg">
    <div class="row">
      <div class="col">

        <div class="Images">
          <img src="http://localhost/LR3WEB/img/1.jpg" href="#" alt="img-thumbnail">
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
            <a class="nav-link" href="#">Поиск в архиве</a>
            <a class="nav-link" href="#">Памятники из гранита ˅</a>
            <a class="nav-link" href="#">Виды памятников ˅</a>
            <a class="nav-link" href="#">По цвету ˅</a>
            <a class="nav-link" href="#">Мемориальные комплексы</a>
            <a class="nav-link" href="#">Благоустройство ˅</a>
          </nav>
        </div>
      </div>
    </div>

    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="row rows mb-3">
      <div class="col text-center">

        <?php if (isset($Errors['message'])) {
          echo '<p>' . $Errors['message'] . '</p>';
          unset($Errors['message']);
        } ?>

      </div>
    </div>

    <div class="row rows justify-content-center">
      <div class="col text-center">
        <form action="Logic/register_logic.php" method="POST">
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">ФИО</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="fio" placeholder="Введите свое ФИО" value="<?php
              if (isset($Errors['register']['fio'])) {
                echo $Errors['register']['fio'];
                unset($Errors['register']['fio']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="birthday" class="col-sm-2 col-form-label">Дата рождения</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="birthday" placeholder="Введите дату рождения" value="<?php
              if (isset($Errors['register']['birthday'])) {
                echo $Errors['register']['birthday'];
                unset($Errors['register']['birthday']);
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
                    if (isset($Errors['register']['pol']) && $Errors['register']['pol'] === "Муж") {
                      echo "checked";
                    } ?>>
                    <label class="form-check-label" for="gridRadios1">
                      Муж
                    </label>
                  </div>
                  <div class="form-check text-lg-start">
                    <input class="form-check-input" type="radio" name="pol" id="gridRadios2" value="Жен" <?php
                    if (isset($Errors['register']['pol']) && $Errors['register']['pol'] === "Жен") {
                      echo "checked";
                    }
                    unset($Errors['register']['pol']); ?>>
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
              if (isset($Errors['register']['blood_type'])) {
                echo $Errors['register']['blood_type'];
                unset($Errors['register']['blood_type']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Резус фактор</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="rezus_factor" placeholder="Введите свой резус фактор" value="<?php
              if (isset($Errors['register']['rezus_factor'])) {
                echo $Errors['register']['rezus_factor'];
                unset($Errors['register']['rezus_factor']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Интересы</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" name="interests" placeholder="Введите то, чем вы увлекаетесь"><?php
              if (isset($Errors['register']['interests'])) {
                echo $Errors['register']['interests'];
                unset($Errors['register']['interests']);
              } ?></textarea>
            </div>
          </div>

          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Адрес</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="address" placeholder="Введите свой адрес проживания" value="<?php
              if (isset($Errors['register']['address'])) {
                echo $Errors['register']['address'];
                unset($Errors['register']['address']);
              } ?>">
            </div>
          </div>
          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Ссылка на профиль ВК</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="profile_vk" placeholder="Введите ссылку на свой профиль ВК"
                value="<?php
                if (isset($Errors['register']['profile_vk'])) {
                  echo $Errors['register']['profile_vk'];
                  unset($Errors['register']['profile_vk']);
                } ?>">
            </div>
          </div>

          <div class="row rows mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="login" placeholder="Введите свой логин" value="<?php
              if (isset($Errors['register']['login'])) {
                echo $Errors['register']['login'];
                unset($Errors['register']['login']);
              } ?>">
            </div>
          </div>
          <label for="inputEmail" class="col-sm-2 col-form-label">Пароль должен содержать буквы латинского алфавита,
            <br>
            прописные и строчные, <br>не меньше 6 символов</label>
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
            У вас есть аккаунт? - <a href="/LR3WEB/enter.php">Авторизируйтесь</a>
          </p>


        </form>
      </div>
    </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////-->
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