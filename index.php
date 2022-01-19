<?php
include 'Config.php';

session_start();

error_reporting(0);

if(isset($_SESSION['first_name'])){
    header("Location: welcome.php");
}

if(isset($POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['first_name'] = $row['first_name'];
        header("Location: welcome.php");
    }else {
        echo "<script>alert('Email or Password is wrong.')</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        Email: <input type="email" name="email" value="<?php echo $email;?>" required><br>
        Password: <input type="password" name="password" value="<?php echo $_POST['password'];?>" required>
        <button name="submit"><a href="welcome.php"> Login</button>
    

    <p> Don't have an account?
    <a href="register.php">Register Here</a>
</p>
</form>
</body>
</html>