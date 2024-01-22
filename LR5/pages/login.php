<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/index.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/user_actions.php'); 
    $errors = UserActions::signIn();
?>

<!DOCTYPE html>
<html lang="en">
  <?php
    include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/head.php');
    include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/header.php');

    if (isset($_SESSION['USER_ID'])) {        
        ?>
        <div class="container d-flex justify-content-center align-items-center" id="container_register">
            <div class="card col-6">
                <div class="card-body ">
                    <div class="alert alert-success" role="alert">
                        <?php echo 'Вы уже авторизованы как ' . $_SESSION['USER_NAME'] . '. <a href="logout.php"> Выйти</a>'; ?>
                    </div>
                </div>    
            </div>
        </div>
        <?php       
        include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/footer.php');
    } 
    else
    {  
  
  ?>  

  <body>  
 
  <div class="container d-flex justify-content-center align-items-center" id="container_register">
    <div class="card col-6">
        <div class="card-body ">
            <?php
                // Проверяем наличие ошибок и выводим сообщение об ошибке
                if (isset($errors['success']) && !$errors['success']) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errors['message']; ?>
                    </div>
                    <?php
                } 
           ?>
    
            <h2 class="text-center mb-4 mt-4">Авторизация</h2>
            <form method="post">
                <div class="mb-4">  
                    <label for="email" class="form-label">Введите E-mail</label>          
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>
                <div class="mb-4"> 
                    <label for="password" class="form-label">Пароль</label>          
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
                </div>                
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-serveces" name="action" value="signIn" >Войти</button> 
                </div>                
            </form>
        </div>
    </div>
</div>

    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/footer.php'); ?>
  </body>
</html>
<?php
}
?>