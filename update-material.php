<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Обновление материала</title>
</head>
<body>
<div class="main-wrapper">
    <div class="content">
        <?php
            include "./block/nav.php";
        ?>

        <?php 
            if(isset($_GET["id"])) {
                include "./php/db.php";

                $id = (int)$_GET["id"];

                $item = $db->query("SELECT * FROM `material` WHERE id='$id'");
                $item = mysqli_fetch_assoc($item);
                if(is_null($item)) {
                    header("Location: ./index.php");
                    exit();
                }
            }
        ?>
        <div class="container">
            <h1 class="my-md-5 my-4">Обновить материал</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form method="POST" action="./php/create-update-material.php">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelectType" name="type" required>
                                <option selected value="<?=$item["type"]?>">Выберите тип(Сейчас <?=$item["type"]?>)</option>
                                <option value="Книга">Книга</option>
                                <option value="Статья">Статья</option>
                                <option value="Видео">Видео</option>
                                <option value="Сайт/Блог">Сайт/Блог</option>
                                <option value="Подборка">Подборка</option>
                                <option value="Ключевые идеи книги">Ключевые идеи книги</option>
                            </select>
                            <label for="floatingSelectType">Тип</label>
                            <div class="invalid-feedback">
                                Пожалуйста, выберите значение
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelectCategory" name="category" required>
                                <option selected value="<?=$item["category"]?>">Выберите категорию(Сейчас <?=$item["category"]?>)</option>
                                <option value="Деловые/Бизнес-процессы">Деловые/Бизнес-процессы</option>
                                <option value="Деловые/Найм">Деловые/Найм</option>
                                <option value="Деловые/Реклама">Деловые/Реклама</option>
                                <option value="Деловые/Управление бизнесом">Деловые/Управление бизнесом</option>
                                <option value="Деловые/Управление людьми">Деловые/Управление людьми</option>
                                <option value="Деловые/Управление проектами">Деловые/Управление проектами</option>
                                <option value="Детские/Воспитание">Детские/Воспитание</option>
                                <option value="Дизайн/Общее">Дизайн/Общее</option>
                                <option value="Дизайн/Logo">Дизайн/Logo</option>
                                <option value="Дизайн/Web дизайн">Дизайн/Web дизайн</option>
                                <option value="Разработка/PHP">Разработка/PHP</option>
                                <option value="Разработка/HTML и CSS">Разработка/HTML и CSS</option>
                                <option value="Разработка/Проектирование">Разработка/Проектирование</option>
                            </select>
                            <label for="floatingSelectCategory">Категория</label>
                            <div class="invalid-feedback">
                                Пожалуйста, выберите значение
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" name="name" required value="<?=$item["name"]?>">
                            <label for="floatingName">Название</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" name="author" id="floatingAuthor" value="<?=$item["author"]?>">
                            <label for="floatingAuthor">Авторы</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Напишите краткое описание" id="floatingDescription" name="description"
                              style="height: 100px"><?=$item["description"]?></textarea>
                            <label for="floatingDescription">Описание</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?=$item["id"]?>">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "./block/footer.php"
    ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>
</html>