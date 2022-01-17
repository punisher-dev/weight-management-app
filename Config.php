<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "weight_management_app";

$conn = mysqli_connect($servername, $username, $pass, $db);

if (!$conn){
    die("<script>alert('Connection Failed')</script>");
}


?>