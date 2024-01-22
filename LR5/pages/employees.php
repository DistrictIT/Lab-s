<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/index.php'); 

$employees = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employees = filterEmployees($_POST);
}

$jobTitles = getJobTitles();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/head.php'); ?> 
<body>
    <?php  
    include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/header.php'); 
    if (!isset($_SESSION['USER_ID'])) {        
        print "<h2 align='center'>Вы не авторизованы!</h2>";
    } 
    else{  
    
    ?> 
<div class="row">
            <div class="col">
                <div class="tivirp p-3 mb-2 bg-light text-dark ">
                    <H2><b>Параметры поиска</b></H2>
                </div>
            </div>
        </div>
    <div class="container mt-5">
    <form action="" method="POST" class="mb-4">
            <div class="row">
                <!-- Текстовое поле для ФИО -->
                <div class="col-md-4 mb-3">
                <input type="text" class="form-control" name="fio" placeholder="Введите ФИО" 
                    value="<?php echo isset($_POST['fio']) ? htmlspecialchars($_POST['fio']) : ''; ?>">
                </div>

                <!-- Поле для количества людей -->
                <div class="col-md-3 mb-3">
                <input type="number" class="form-control" name="yearBirth" placeholder="Введите дату" 
                    value="<?php echo isset($_POST['yearBirth']) ? intval($_POST['yearBirth']) : ''; ?>">
                </div>

                <!-- Выпадающий список для Job Title -->
                <div class="col-md-3 mb-3">
                    <select id="jobTitle" name="jobTitle" class="form-control">
                        <option value="">Выберите номер участка</option>
                        <?php foreach ($jobTitles as $jobTitle): ?>
                            <option value="<?php echo $jobTitle['id']; ?>" 
                                <?php echo (isset($_POST['jobTitle']) && $_POST['jobTitle'] == $jobTitle['id']) ? 'selected' : ''; ?>>
                                <?php echo $jobTitle['name']; ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Кнопки " -->
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" name="applyFilter" class="me-3 btn btn-primary ">Применить фильтр</button>
                    <button type="submit" name="resetFilter" class="ms-3 btn btn-secondary">Сбросить фильтр</button>                    
                </div>
            </div>
        </form>

        <form action="EditUser.php" method="get" class="col-12 d-flex justify-content-center mb-4">
            <button type="submit" name="AddUser" value="true" class="ms-3 btn btn-control-edit">Добавить участок</button>
        </form>

        <form action="EditUser.php" method="get">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Номер</th>
                        <th class="text-center">Фото</th>
                        <th class="text-center">ФИО</th>
                        <th class="text-center">Номер участка</th>
                        <th class="text-center">Количество людей</th>
                        <th class="text-center">Дата</th>
                        <th class="text-center">Меню</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($employees){                
                        foreach ($employees as $employee) {
                            $imagePath = "/LR5/inc/catalog_images/" . $employee["photo"];
                            echo "<tr>";
                            echo "<td>" . $employee["id"] . "</td>";
                            echo "<td><img src='" . $imagePath . "' alt='photo' style='width: 200px; max-height: auto;'></td>";
                            echo "<td>" . $employee["FIO"] . "</td>";
                            echo "<td>" . $employee["jobTitleName"] . "</td>";
                            echo "<td>" . $employee["characteristic"] . "</td>";
                            echo "<td>" . $employee["yearBirth"] . "</td>";

                            echo "<td class='text-center'>
                                    <button type='submit' name='EditEmployees' class='btn btn-control-edit' value='" . $employee["id"] . "'>Редактировать</button>
                                    <button type='submit' name='DeleteEmployees' class='btn btn-control-del m-2' value='" . $employee["id"] . "'>Удалить</button>
                                </td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Записи в базе данных не найдены</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>        
    </div>
<?php
}
?>
</body>
</html>