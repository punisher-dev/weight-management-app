<?php
include 'Config.php';

session_start();

$result = '';

$email = '';
$password = '';

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['first_name'] = $row['first_name'];
    } else {
        echo "<script>alert('Email or Password is wrong.')</script>";
    }
}

if(isset($_SESSION['first_name'])){
    header("Location: welcome.php");
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
    <form action="" method="POST">
        Email: <input type="email" name="email" value="<?php echo $email;?>" required /><br />
        Password: <input type="password" name="password" required /><br />
        <button type="submit" name="submit">Login</button>
    

    <p> Don't have an account?
    <a href="register.php">Register Here</a>
</p>
</form>
</body>
</html>