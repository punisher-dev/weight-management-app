<?php

$mySqlDatabase = "railway";
$mySqlHost = "containers-us-west-158.railway.app";
$pass = "cuBKMzc0CxtocPIQ3qLF";
$mySqlPort = "7431";
$mySqlUser = "root";

$dsn = 'mysql://'. $mySqlUser .':'. $pass .'@'.$mySqlHost.':'.$mySqlPort.'/'.$mySqlDatabase;

$conn = new PDO($dsn, $mySqlUser, $pass);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if (!$conn){
    die("<script>alert('Connection Failed')</script>");
} 


?>









