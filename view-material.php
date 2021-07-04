<?php 
include "./php/db.php";

if(isset($_GET["id"])) {
    $id = (int)$_GET["id"];

    $item = $db->query("SELECT * FROM `material` WHERE id='$id'");
    $item = mysqli_fetch_assoc($item);
    if(is_null($item)) {
        header("Location: ./index.php");
        exit();
    }


    $tags = $db->query("SELECT * FROM `material_tag` WHERE material_id='$id'");
    $links = $db->query("SELECT * FROM `material_link` WHERE material_id='$id'");
}


?>
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

    <title>Материалы</title>
</head>
<body>

<div class="main-wrapper">
    <div class="content">
        <?php
            include "./block/nav.php";
        ?>
        <div class="container">
            <h1 class="my-md-5 my-4"><?=$item["name"]?></h1>
            <div class="row mb-3">
                <div class="col-lg-6 col-md-8">
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Авторы</p>
                        <p class="col"><?=$item["author"]?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Тип</p>
                        <p class="col"><?=$item["type"]?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Категория</p>
                        <p class="col"><?=$item["category"]?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Описание</p>
                        <p class="col"><?=$item["description"]?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="./php/create-tag.php">
                        <h3>Теги</h3>
                        <div class="input-group mb-3">
                            <select class="form-select" id="selectAddTag" aria-label="Добавьте автора" name="tag">
                                <option selected value="Тег1">Тег1</option>
                                <option value="Тег2">Тег2</option>
                                <option value="Тег3">Тег3</option>
                                <option value="Тег4">Тег4</option>
                            </select>
                            <input type="hidden" value="<?=$item["id"]?>" name="material_id">
                            <button class="btn btn-primary" type="submit">Добавить</button>
                        </div>
                    </form>
                    <ul class="list-group mb-4">
                        <?php
                            while($tag = mysqli_fetch_assoc($tags)) {
                                include "./block/tag.php";
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Ссылки</h3>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Добавить</a>
                    </div>
                    <ul class="list-group mb-4">
                        <?php
                            while($link = mysqli_fetch_assoc($links)) {
                                include "./block/link.php";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "./block/footer.php";
    ?>

</div>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="./php/create-update-link.php">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Добавьте подпись" name="signature"
                            id="floatingModalSignature">
                        <label for="floatingModalSignature">Подпись</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink" name="link">
                        <label for="floatingModalLink">Ссылка</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>
                    <input type="hidden" value="<?=$item["id"]?>" name="material_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="updateModalToggle" aria-hidden="true" aria-labelledby="updateModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalToggleLabel">Обновить ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="./php/create-update-link.php">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Добавьте подпись" name="signature"
                            id="floatingModalSignature">
                        <label for="floatingModalSignature">Подпись</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink" name="link">
                        <label for="floatingModalLink">Ссылка</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>
                    <input type="hidden" value="" name="id" id="updateModalLinkInput">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    $action = "./php/delete-tag.php";
    $modal_id = "deleteModalTag";
    include "./block/modal.php";
?>
<?php
    $action = "./php/delete-link.php";
    $modal_id = "deleteModalLink";
    include "./block/modal.php";
?>
<!-- Optional JavaScript; choose one of the two! -->
<script src="./js/setIdToModal.js"></script>
<script>
    setIdToModal(document.getElementsByClassName("js-delete-tag"), "deleteModalTagInput");
    setIdToModal(document.getElementsByClassName("js-delete-link"), "deleteModalLinkInput");
    setIdToModal(document.getElementsByClassName("js-update-link"), "updateModalLinkInput");
</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>



</body>
</html>