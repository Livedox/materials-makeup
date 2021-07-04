<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername = "localhost";
$database = "library";
$username = "root";
$password = "";

$db = new mysqli($servername, $username, $password, $database);

if (!$db) {
    die("Connection failed");
}
