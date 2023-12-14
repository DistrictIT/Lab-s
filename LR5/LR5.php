<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit();
}
?>
<?php require_once 'logic/games_logic.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Справочник</title>
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

  <div class="row rows" style="margin-left: 10px">
    <div class="col">
      <?php if (isset($_SESSION['user'])): ?>
        <label>Вы вошли как:
          <?= $_SESSION['user']['login'] ?>
        </label>
        <a style="color: #e2501e; outline: none; text-decoration: none; font-family: sans-serif;"
          href="logic/logout.php"><br>Выход</a>
      <?php endif; ?>
    </div>
  </div>

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
          <img src="../LR2WEB1/img/1.jpg" href="#" alt="img-thumbnail">
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

    <!--  ///////////////////////////////////////////////////////////////////// -->
    <div class="row text-center rows">
		<div class="col">
			<form>
				<div class="form-group">
					<label for="exampleFormControlInput1">Фильтр по наименованию</label>
					<input class="form-control" name="gameNamefilter" placeholder="Введите наименование товара"
						value="<?php if (isset($_GET['gameNamefilter']))
							echo $_GET['gameNamefilter']; ?>">

				</div>
				<br>
				<div class="form-group">
					<label for="priceFrom">Фильтр по цене</label>
					<input class="form-control" name="priceFrom" placeholder="Цена от"
						value="<?php if (isset($_GET['priceFrom']))
							echo $_GET['priceFrom']; ?>">
					<label for="priceTo"></label>
					<input class="form-control" name="priceTo" placeholder="Цена до"
						value="<?php if (isset($_GET['priceTo']))
							echo $_GET['priceTo']; ?>">
				</div>
				<br>
				<div class="form-group">
					<label for="genreFilter">Фильтрация по жанру</label>
					<select class="form-control" name="genreFilter">
						<option>Нет</option>
						<?php foreach ($genres as $genre): ?>
							<option <?php if (isset($_GET["genreFilter"]) && $genre["name"] == $_GET["genreFilter"]) { ?>selected<?php } else {
							} ?>>
								<?php echo $genre['name'] ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<br>
				<div class="form-group">
					<label for="descFilter">Фильтр по описанию</label>
					<textarea class="form-control" name="descFilter" rows="3"
						placeholder="Введите описание игры"><?php if (isset($_GET['descFilter']))
							echo $_GET['descFilter']; ?></textarea>
				</div>
				<br>
				<button class="btn btn-light btn-lg fs-6 " type="submit">Найти</button>
				<button class="btn btn-light btn-lg fs-6 " type="button" name="resetButton"
					onclick="resetForm()">Сбросить</button>

			</form>

			<div class="row text-end">
				<div class="col">
					<!-- кнопка добавить -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
						Добавить
					</button>

					<!-- начало модуля добавления новой записи-->
					<div class="modal fade text-center" id="create" data-bs-backdrop="static" data-bs-keyboard="false"
						tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Добавление записи</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-group">
									<form action="" method="POST" enctype="multipart/form-data">
										<label for="exampleFormControlInput1">Введите наименование</label>
										<input class="form-control" name="gameName"
											placeholder="Введите наименование товара"
											value="<?php if (isset($_POST['gameName']))
												echo $_POST['gameName']; ?>">
								</div>
								<div class="form-group">
									<label for="price">Цена</label>
									<input class="form-control" name="price" placeholder="Введите цену"
										value="<?php if (isset($_POST['price']))
											echo $_POST['price']; ?>">
								</div>
								<br>
								<div class="form-group">
									<label for="genre">Жанр</label>
									<select class="form-control" name="genre">
										<option <?php if (!isset($_POST["genre"]))
											echo 'selected'; ?>>Нет</option>
										<?php foreach ($genres as $genre): ?>
											<option <?php if (isset($_POST["genre"]) && $genre["name"] == $_POST["genre"]) {
												echo "selected";
											} ?> value=<?php echo $genre['id'] ?>><?php echo $genre['name'] ?>
											</option>
										<?php endforeach; ?>
									</select>

								</div>
								<br>
								<div class="form-group">
									<label for="desc">Описание товара</label>
									<textarea class="form-control" name="desc" rows="3"
										placeholder="Введите описание товара"><?php if (isset($_POST['desc']))
											echo $_POST['desc']; ?></textarea>
								</div>
								<br>
								<div class="mb-3">
									<label for="formFile" class="form-label">Выберите файл изображения</label>
									<input class="form-control" type="file" id="formFile" name="image"
										value="<?php if (isset($_FILES['image']))
											echo $_FILES['image']['name']; ?>">
								</div><br>

								<?php if (isset($_POST['add'])) {
									echo "<p>" . $message . "<p>";
								} ?>
								<button class="btn btn-dark btn-lg fs-6 " type="submit" name="add">Добавить</button>
								</form>
							</div>
						</div>
					</div>
					<!-- конец модуль добавления новой записи-->
				</div>
			</div>

			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Изображение</th>
							<th>Название</th>
							<th>Жанр</th>
							<th>Описание</th>
							<th>Стоимость</th>
						</tr>
					</thead>

					<tbody>
						<?php if ($items !== null)
							foreach ($items as $item): ?>
								<tr>
									<td> <img src="<?php echo $item['img_path']; ?>" style="width: 150px;height: 200px;"></td>
									<td>
										<?php echo $item['name'] ?>
									</td>
									<td>
										<?php echo $item['genre_name'] ?>
									</td>
									<td>
										<?php echo $item['description'] ?>
									</td>
									<td>
										<?php echo $item['cost'] ?> руб.
									</td>

									<!--  кнопки ред и удал-->
									<td width="10%">
										<a href="?edit=<?php echo $item['id'] ?>" class="btn btn-success" data-bs-toggle="modal"
											data-bs-target="#edit<?php echo $item['id'] ?>">Ред. </a>
										<a href="?delete=<?php echo $item['id'] ?>" class="btn btn-danger"
											data-bs-toggle="modal" data-bs-target="#delete<?php echo $item['id'] ?>">Удал.</a>
									</td>
								</tr>

								<!-- модальное окно обновления-->
								<div class="modal fade" id="edit<?php echo $item['id'] ?>" data-bs-backdrop="static"
									data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
									aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">Редактирование записи</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>

											<div class="modal-body">
												<form action="" method="POST" enctype="multipart/form-data">
													<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
													<label for="exampleFormControlInput1">Введите наименование</label>
													<input class="form-control" name="gameName"
														placeholder="Введите наименование товара"
														value="<?php echo $item['name'] ?>">
											</div>

											<div class="form-group">
												<label for="price">Цена</label>
												<input class="form-control" name="price" placeholder="Введите цену"
													value="<?php echo $item['cost'] ?>" required>
											</div>
											<br>

											<div class="form-group">
												<label for="genre">Жанр</label>
												<select class="form-control" name="genre">
													<option>Нет</option>
													<?php foreach ($genres as $genre): ?>
														<option <?php if ($genre['name'] === $item['genre_name']) { ?>selected<?php } ?>
															value=<?php echo $genre['id'] ?>><?php echo $genre['name'] ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<br>

											<div class="form-group">
												<label for="desc">Описание товара</label>
												<textarea class="form-control" name="desc" rows="3"
													placeholder="Введите описание товара"
													required><?php echo $item['description'] ?></textarea>
											</div>
											<br>

											<div> <img src="<?php echo $item['img_path']; ?>"
													style="width: 200px;height: 200px;"></div>
											<div class="mb-3">
												<label for="formFile" class="form-label">Выберите файл изображения</label>
												<input class="form-control" type="file" id="formFile" name="image"
													value="<?php echo $item['img_path']; ?>">
											</div>
											<br>

											<?php if (isset($_POST['edit'])) {
												echo "<p>" . $message . "<p>";
											} ?>
											<button class="btn btn-dark btn-lg fs-6 " type="submit"
												name="edit">Обновить</button>
											</form>
										</div>
									</div>
								</div>

								<!-- конец обновления-->

								<!-- модальное окно изменения-->
								<div class="modal fade" id="delete<?php echo $item['id'] ?>" data-bs-backdrop="static"
									data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
									aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">Удалить запись</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											Вы действительно хотите удалить запись?

											<div class="modal-footer">
												<form action="" method="POST" enctype="multipart/form-data">
													<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
													<?php if (isset($_POST['delete'])) {
														echo "<p>" . $message . "<p>";
													} ?>
													<button class="btn btn-dark btn-lg  " type="submit"
														name="delete">Удалить</button>
												</form>
											</div>

										</div>
									</div>
								</div>
								<!-- конец удаления-->

							<?php endforeach; ?>
					</tbody>
				</table>
			</div>

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

    <script type="text/javascript">
      function resetForm() {
        window.location = window.location.href.split("?")[0];

        $('#create').on('hidden.bs.modal', function (e) {
          $(this).find("input,textarea,select").val('').end();
        })
      }
    </script>

</body>

</html>