<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/index.php'); 
    $errors = UserActions::signUp();
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
    
            <h2 class="text-center mb-4 mt-4">Регистрация</h2>
            <form method="post">
                <div class="mb-4">  
                    <label for="email" class="form-label">Введите E-mail</label>          
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>
                <div class="mb-4"> 
                    <label for="password" class="form-label">Пароль</label>          
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
                </div>
                <div class="mb-4"> 
                    <label for="twoPassword" class="form-label">Повторите пароль</label>          
                    <input type="password" class="form-control" id="twoPassword" name="twoPassword" value="<?php echo isset($_POST['twoPassword']) ? htmlspecialchars($_POST['twoPassword']) : ''; ?>" required>
                </div>
                <div class="mb-4"> 
                    <label for="full_name" class="form-label">ФИО</label>     
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>" required>
                </div>
                <div class="mb-4">
                    <label for="date" class="form-label">Дата рождения</label>
                    <input type="date" class="form-control" id="date" name="date" required value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>" pattern="\d{2}\.\d{2}\.\d{4}">
                </div>
                <div class="mb-4"> 
                    <label for="address" class="form-label">Адрес</label>
                    <input type="address" class="form-control" id="address" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>" required></input>
                </div>
                <div class="mb-4"> 
                    <label for="gender" class="form-label">Пол</label>
                    <select class="form-select" id="gender" name="gender" value="<?php echo isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : ''; ?>" required>
                        <option value="М">М</option>
                        <option value="Ж">Ж</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="interests" class="form-label">Интересы (текстом)</label>
                    <textarea class="form-control" name="interests" required><?php echo isset($_POST['interests']) ? htmlspecialchars($_POST['interests']) : ''; ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="link" class="form-label">Ссылка на профиль социальной сети</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo isset($_POST['link']) ? htmlspecialchars($_POST['link']) : ''; ?>" required>
                </div>
                <div class="mb-4">
                    <label for="blood_group" class="form-label">Группа крови</label>
                    <select class="form-select" id="blood_group" name="blood_group" required>
                        <option value="I" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'I') ? 'selected' : ''; ?>>I</option>
                        <option value="II" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'II') ? 'selected' : ''; ?>>II</option>
                        <option value="III" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'III') ? 'selected' : ''; ?>>III</option>
                        <option value="IV" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'IV') ? 'selected' : ''; ?>>IV</option>
                    </select> 
                </div>
                <div class="mb-4">
                    <label for="rh_factor" class="form-label">Резус-фактор</label>
                    <select class="form-select" id="rh_factor" name="rh_factor" value="<?php echo isset($_POST['rh_factor']) ? htmlspecialchars($_POST['rh_factor']) : ''; ?>" required>
                        <option value="+" <?php echo (isset($_POST['rh_factor']) && $_POST['rh_factor'] === '+') ? 'selected' : ''; ?>>+</option>
                        <option value="-" <?php echo (isset($_POST['rh_factor']) && $_POST['rh_factor'] === '-') ? 'selected' : ''; ?>>-</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-serveces" name="action" value="signup" >Зарегистрироваться</button> 
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