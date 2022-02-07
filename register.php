<?php 
include 'Config.php';

session_start();

if(isset($_SESSION['first_name'])){
    header("Location: index.php");
}

$first_name = '';
$last_name = '';
$email = '';
$address = '';
$phone = '';

if(isset($_POST['submit'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $created_at = date("y-m-d h:i:s");
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){

                $sql = "INSERT INTO users(first_name, last_name, email, address, phone, created_at, password)
                        VALUES('$first_name', '$last_name', '$email', '$address', '$phone', '$created_at', '$password')";
        
        $result = mysqli_query($conn, $sql);

        if($result){
        echo "<script>alert('User Registered.')</script>";
        $first_name = "";
        $last_name = "";
        $email = "";
        $address = "";
        $phone = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
        } else {
        echo "<script>alert('Something went wrong.')</script>";
        }
    } else {
        echo "<script>alert('E-mail already registered.')</script>";
    }
    } else {
     echo "<script> alert('Password Not Matched.')</script>";
    }
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
    <title>Register</title>

</head>
<body>

<div class="wrapper">
<div class="card">
    <h1> REGISTER </h1>
<form action="" method="POST" >
    <div class="mb-3">
            <label for="first_name" class="form-label">First Name:*</label>
            <input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
    </div>
    <div class="mb-3">
            <label for="last_name" class="form-label">Last Name:*</label>
            <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
    </div>
    <div class="mb-3">
            <label for="email" class="form-label">Email:*</label>
            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
    </div>
    <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" />
    </div>
    <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input class="form-control" type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
    </div>
    <div class="mb-3">
            <label for="password" class="form-label">Password:*</label>
            <input class="form-control" type="password" name="password" />
    </div>
    <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password:*</label>
            <input class="form-control" type="password" name="cpassword" />
    </div>
<button class="btn btn-secondary" type="submit" name="submit">Register</button>


<p> Have an account?
    <a href="index.php">Login Here</a>
</p>

</form>
</div>
</div>
</body>
</html>