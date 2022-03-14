<?php
include 'Config.php';

session_start();

$result = '';

$email = '';
$password = '';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);
    $result = $stmt->rowCount();
    $fetch = $stmt->fetchAll();


    foreach($fetch as $item){
        $first_name = $item->first_name;
        $user_id = $item->user_id;
        break;
    }

    if($result > 0){
        $_SESSION['first_name'] = $first_name;
        $_SESSION['user_id'] = $user_id;
    } else {
        echo "<script>alert('Email or Password is wrong.')</script>";
    }
}



if(isset($_SESSION['first_name']) && isset($_SESSION['user_id'])){
    header("Location: welcome.html");
}


?>