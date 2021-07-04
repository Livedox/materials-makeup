<?php

include "./db.php";

if(isset($_POST["material_id"],$_POST["tag"])) {
    $material_id = $db->real_escape_string($_POST["material_id"]);
    $tag = $db->real_escape_string($_POST["tag"]);

    $db->query("INSERT INTO `material_tag` (material_id, tag) VALUES ('$material_id', '$tag')");
    header("Location: ../view-material.php?id={$material_id}");
}