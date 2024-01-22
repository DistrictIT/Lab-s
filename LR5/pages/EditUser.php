<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/index.php'); 
    
    if(isset($_GET['EditEmployees']) || isset($_GET['DeleteEmployees'])){
        $data = EmployeesActions::GetInfoEmployees();        
    } 
 
    if(empty($data)){
        $errors = EmployeesActions::AddEmployees();
        $title = "Добавление нового участка";
        $valueButton = "AddEmployees";
        $titleButton = "Добавить участок";
    }
    else{
        if(isset($_GET['EditEmployees'])){
            $errors = EmployeesActions::EditEmployees();
            $title = "Редактирование информации о участке";
            $valueButton = "ChangeDate";
            $titleButton = "Измененить данные";
        }
        elseif(isset($_GET['DeleteEmployees'])){
            $errors = EmployeesActions::DeleteEmployees();
            $title = "Удалить данный участок?";
            $valueButton = "DeleteEmployees";
            $titleButton = "Удалить участок";
        }
    }
    

?> 

<!DOCTYPE html>
<html lang="en">
  <?php
    include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/head.php');
    include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/header.php');
    
    if (!isset($_SESSION['USER_ID'])) {        
        header('Location: /LR5/pages/login.php');
    } 
    else{ 
        $jobTitles = getJobTitles();
  ?>  

  <body>  
 
  <div class="container d-flex justify-content-center align-items-center" id="container_register">
    <div class="card col-9">
        <div class="card-body ">
            <?php           
                // Проверяем наличие ошибок и выводим сообщение об ошибке
                if (isset($errors['success']) && !$errors['success']) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errors['message']; ?>
                    </div>
            <?php } 
                if(!isset($_GET['success'])) {  
            ?>
            <h2 class="text-center mb-4 mt-4"><?php echo $title; ?></h2>
            <div class="container-lg mt-5">
                <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center flex-grow-1">  
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <input type="text" hidden name="photo" value="<?php echo((!empty($data[0]['photo']) ? $data[0]['photo'] : '')) ?>">
                            <?php $photo = (!empty($_POST['photo']) ? $_POST['photo'] : (!empty($data[0]['photo']) ? $data[0]['photo'] : '')); ?>
                            <img class="mb-4" src="../inc/catalog_images/<?php echo $photo;   ?>" style='width: 200px; max-height: auto;'>                                
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">  
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="FIO">ФИО:</label>
                                <?php $name = (!empty($_POST['FIO']) ? $_POST['FIO'] : (!empty($data[0]['FIO']) ? $data[0]['FIO'] : '')); ?>
                                <input type="text" class="form-control" name="FIO" value="<?php echo $name ?>">
                            </div>
                            <div class="mt-3">
                                <label for="jobTitle">Вид спорта</label>
                                <select id="jobTitle" name="jobTitle" class="form-control" >                                   
                                    <?php  $id_jobTitle = (!empty($_POST['jobTitle']) ? $_POST['jobTitle'] : (!empty($data[0]['id_jobTitle']) ? $data[0]['id_jobTitle'] : '')); ?>                                    
                                    <option value=""> </option>
                                    <?php foreach ($jobTitles as $jobTitle): ?>
                                        <option value="<?php echo $jobTitle['id']; ?>"
                                            <?php echo ($id_jobTitle == $jobTitle['id']) ? 'selected' : ''; ?>>
                                            <?php echo $jobTitle['name']; ?> 
                                        </option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                            <div class="mt-3">
                                <label for="characteristic">Биография</label>
                                <?php $character = (!empty($_POST['characteristic']) ? $_POST['characteristic'] : (!empty($data[0]['characteristic']) ? $data[0]['characteristic'] : ''));   ?>
                                <textarea class="form-control" name="characteristic" rows="3"><?php echo $character ?></textarea>
                            </div>
                            <div class="mt-3">
                                <label for="date" class="form-label">Год рождения</label>
                                <?php $year = (!empty($_POST['yearBirth']) ? $_POST['yearBirth'] : (!empty($data[0]['yearBirth']) ? $data[0]['yearBirth'] : '')); ?>
                                <input type="text" class="form-control" name="yearBirth" value="<?php echo $year ?>">
                            </div>                            
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" name="action" value="<?php echo $valueButton ?>" class="btn btn-secondary w-100"><?php echo $titleButton ?></button>
                        </div> 
                    </div>                    
                </form>                
            </div>
        </div> 
    </div>
</div> 

    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/LR5/parts/footer.php'); ?>
  </body>
</html>
<?php            
        }    
    else{
        if(isset($_GET['success']) && ($_GET['success'] == 'AddEmployees') ) {
            echo "<div class='alert alert-success' role='alert'>";
            echo 'Участок успешно добавлен в базу'; 
            echo "</div>";  
        }
        elseif(isset($_GET['success']) && ($_GET['success'] == 'EditEmployees')){
            echo "<div class='alert alert-success' role='alert'>";
            echo 'Участок успешно изменен в базе'; 
            echo "</div>";  
        }
        elseif(isset($_GET['success']) && ($_GET['success'] == 'DeleteEmployees')){
            echo "<div class='alert alert-success' role='alert'>";
            echo 'Участок успешно удален из базы'; 
            echo "</div>";                        
        }        
    }

}
?>