<?php
include "./db.php";

if(isset($_POST["link"])) {
    $material_id = isset($_POST["material_id"]) ? (int)$_POST["material_id"] : null;
    $link = $db->real_escape_string($_POST["link"]);
    $signature = isset($_POST["signature"]) ? $db->real_escape_string($_POST["signature"]) : "";
    $id = isset($_POST["id"]) ? (int)$_POST["id"] : null;
    
    if(!$id) {
        $db->query("INSERT INTO `material_link` (material_id, link, signature) VALUES ('$material_id', '$link', '$signature')");
    } else {
        $db->query("UPDATE `material_link` SET signature='$signature', link='$link' WHERE id = '$id'");
    }
    
    header("Location: ".$_SERVER["HTTP_REFERER"]);
}