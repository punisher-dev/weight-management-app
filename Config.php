<?php

// $mySqlDatabase = "railway";
// $mySqlHost = "containers-us-west-158.railway.app";
// $pass = "cuBKMzc0CxtocPIQ3qLF";
// $mySqlPort = "7431";
// $mySqlUser = "root";

// $dsn = 'mysql://'. $mySqlUser .':'. $pass .'@'.$mySqlHost.':'.$mySqlPort.'/'.$mySqlDatabase;

// $conn = new PDO($dsn, $mySqlUser, $pass);
// $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


// if (!$conn){
//     die("<script>alert('Connection Failed')</script>");
// } 

// ____________________________________

// $servername = "localhost";
// $username = "root";
// $pass = "";
// $db = "weight_management_app";

// $conn = mysqli_connect($servername, $username, $pass, $db);
// $dsn = 'mysql:host='. $servername .';dbname='. $db;

// $conn = new PDO($dsn, $username, $pass);
// $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


// if (!$conn){
//     die("<script>alert('Connection Failed')</script>");
// }


// ____________________________________

$db = "railway";
$servername = "containers-us-west-102.railway.app";
$pass = "CH5eONjK1r5PuxMYShup";
// $port = 5475;
$username = "root";


$conn = mysqli_connect($username, $pass, $servername, $db);
// $dsn = 'mysql://root:CH5eONjK1r5PuxMYShup@containers-us-west-102.railway.app:5475/railway';

$dsn = 'mysql://'.$username.':'.$pass.'@'.$servername.':5475/'.$db.'';


$conn = new PDO($dsn, $username, $pass);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if (!$conn){
    die("<script>alert('Connection Failed')</script>");
}



?>









