<?php session_start();
if(isset($_SESSION['user']))
{
    echo "Вы уже авторизованы как ".$_SESSION['user']['login']." <br><a href='Logic/logout.php'>Выход</a>";
    return;
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Авторизация </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"  rel="stylesheet"/>
     <link rel="stylesheet" href="./assets/style.css">.
     <!--JSS + Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body >
  <br>
    <div class ="row rows justify-content-center mb-3">
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
              <input type="password" class="form-control" name="password" placeholder="Введите свой пароль" >
          </div>
      </div>
    <button type="submit" class="btn btn-light">Войти</button>
    <p>
        У вас нет аккаунта?  <a href = "register.php">Зарегистрируйтесь</a>
    </p>
    <div class="row rows mb-3">

             <?php if (isset($_SESSION['message'])) {
                        echo '<p >'.$_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);}?>

    </div>
</form>
</div>
</div>

</body>

</html>
