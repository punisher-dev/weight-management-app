<?php 
include 'Config.php';

error_reporting(0);

session_start();

if(isset($_SESSION['FirstName'])){
    header("Location: index.php");
}

if(isset($_POST['submit'])){
    $FirstName = $_POST['FirstName'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);
        if(!$result->num_rows > 0){
                $sql = "INSERT INTO users(FirstName, LastName, Email, Address, Phone, Password)
                        values('$FirstName', '$lname', '$email', '$address', '$phone', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
        echo "<script>alert('User Registered.')</script>";
        $FirstName = "";
        $lname = "";
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
    <title>Document</title>
</head>
<body>


    <h1> Register </h1>
<form action="" method="post" >
First Name: <input type="text" name="FirstName" value="<?php echo $FirstName; ?>"><br>
Last Name: <input type="text" name="lname" value="<?php echo $lname; ?>"><br>
Email: <input type="email" name="email" value="<?php echo $email; ?>"><br>
Address: <input type="text" name="address" value="<?php echo $address; ?>"><br>
Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"> <br>
Password: <input type="password" name="password" value="<?php echo $_POST["password"]; ?>"> <br>
Confirm Password: <input type="password" name="cpassword" value="<?php echo $_POST["cpassword"]; ?>"> <br>
<input type="submit" name="submit" value="Submit">
</form>

<p> Have an account?
    <a href="index.php">Login Here</a>
</p>



</body>
</html>