<?php

include "./db.php";

if(isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    $db->query("DELETE FROM `material_link` WHERE id='$id'");
    header("Location: ".$_SERVER["HTTP_REFERER"]);
}