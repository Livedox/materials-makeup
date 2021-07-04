<?php

include "./db.php";

if($_POST["id"]) {
    $id = (int)$_POST["id"];
    $db->query("DELETE FROM `material` WHERE id='$id'");
    $db->query("DELETE FROM `material_tag` WHERE material_id='$id'");
    $db->query("DELETE FROM `material_link` WHERE material_id='$id'");
    header("Location: ../index.php");
}