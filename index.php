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
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['user_id'] = $row['user_id'];
    } else {
        echo "<script>alert('Email or Password is wrong.')</script>";
    }
}



if(isset($_SESSION['first_name']) && isset($_SESSION['user_id'])){
    header("Location: welcome.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
<div class="card">
    <h1>Login</h1>
    <form action="" method="POST">
    <div class="mb-3">
                <label for="email" class="form-label">Email:*</label>
                <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email;?>" required />
    </div>
    <div class="mb-3">
            <label for="password" class="form-label">Password:*</label>
            <input class="form-control" type="password" name="password" required />
    </div>
        <button class="btn btn-secondary" type="submit" name="submit">Login</button>
    

    <p> Don't have an account?
    <a href="register.php">Register Here</a>
</p>
</form>
</div>
</div>
</body>
</html>


