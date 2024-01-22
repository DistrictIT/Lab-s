<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/index.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/session.php');

// Проверка авторизации пользователя
if (isset($_SESSION['USER_ID'])) {
    // Если пользователь авторизован, разрушаем сессию
    session_unset();
    session_destroy();
    

    header('Location: /LR5/index.php');
    die();
} else { 
    echo 'Вы не авторизованы. <a href="/LR5/pages/login.php"> Ввести логин и пароль </a> или <a href="/LR5/pages/register.php"> зарегистрироваться</a>';
}
?>