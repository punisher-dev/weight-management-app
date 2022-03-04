<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "weight_management_app";

$dsn = 'mysql:host='. $servername .';dbname='. $db;

$conn = new PDO($dsn, $username, $pass);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if (!$conn){
    die("<script>alert('Connection Failed')</script>");
}


?>