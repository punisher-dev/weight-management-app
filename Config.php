<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


$dsn = 'mysql:host='. $cleardb_server .';dbname='. $cleardb_db;

$conn = new PDO($dsn, $cleardb_username, $cleardb_password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if (!$conn){
    die("<script>alert('Connection Failed')</script>");
}




?>






<!-- $servername = "localhost";
$username = "root";
$pass = "";
$db = "weight_management_app";

$dsn = 'mysql:host='. $servername .';dbname='. $db;

$conn = new PDO($dsn, $username, $pass);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if (!$conn){
    die("<script>alert('Connection Failed')</script>");
} -->


