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
            <h1 class="my-md-5 my-4">Материалы</h1>
            <a class="btn btn-primary mb-4" href="./create-material.php" role="button">Добавить</a>
            <div class="row">
                <div class="col-md-8">
                    <form method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder=""
                                   aria-label="Example text with button addon" aria-describedby="button-addon1" name="search">
                            <button class="btn btn-primary" type="submit" id="button-addon1">Искать</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Категория</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "./php/db.php";
                            if(isset($_GET["search"])) {
                                $search = $db->real_escape_string($_GET["search"]);
                                $res = $db->query("SELECT * FROM `material` WHERE CONCAT_WS(' ', type, category, name, author) LIKE '%"."$search"."%'");
                            } else {
                                $res = $db->query("SELECT * FROM `material`");
                            }
                            

                            while($item = mysqli_fetch_assoc($res)) {
                                include "./block/material.php";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
        include "./block/footer.php"; 
    ?>
</div>

<?php
    $action = "./php/delete-material.php";
    $modal_id = "deleteModal";
    include "./block/modal.php";
?>
<!-- Optional JavaScript; choose one of the two! -->

<script src="./js/setIdToModal.js"></script>
<script>
    setIdToModal(document.getElementsByClassName("js-delete-material"), "deleteModalInput");
</script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

</body>
</html>