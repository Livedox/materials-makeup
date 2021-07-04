<?php

include "./db.php";

if(isset($_POST["name"],$_POST["type"],$_POST["category"])) {
    $name = $db->real_escape_string($_POST["name"]);
    $type = $db->real_escape_string($_POST["type"]);
    $category = $db->real_escape_string($_POST["category"]);
    $author = isset($_POST["author"]) ? $db->real_escape_string($_POST["author"]) : "";
    $description = isset($_POST["description"]) ? $db->real_escape_string($_POST["description"]) : "";
    $id = isset($_POST["id"]) ? (int)$_POST["id"] : null;

    if(!$id) {
        $db->query("INSERT INTO `material` (name, type, category, author, description) VALUES ('$name', '$type', '$category', '$author', '$description')");
    } else {
        $db->query("UPDATE `material` SET name='$name', type='$type', category='$category', author='$author', description='$description' WHERE id = '$id'");
    }
    
    header("Location: ../index.php");
}