<?php 
include 'Config.php';

session_start();

if(isset($_SESSION['first_name'])){
    header("Location: index.php");
}

$first_name = '';
<<<<<<< HEAD
$last_name = '';
=======
$lname = '';
>>>>>>> fcf7d96062fc8ff2a7fef6f01e6148f5ec013743
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
<<<<<<< HEAD

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
=======
        
        if(!$result->num_rows > 0){
            
            $sql = "INSERT INTO users(first_name, last_name, email, address, phone, password) VALUES('$first_name', '$lname', '$email', '$address', '$phone', '$password')";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                echo "<script>alert('User Registered.')</script>";
                $first_name = "";
                $lname = "";
                $email = "";
                $address = "";
                $phone = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Something went wrong.')</script>";
            }
>>>>>>> fcf7d96062fc8ff2a7fef6f01e6148f5ec013743
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

<<<<<<< HEAD

    <h1> Register </h1>
<form action="" method="POST" >
First Name: <input type="text" name="first_name" value="<?php echo $first_name; ?>" /><br />
Last Name: <input type="text" name="last_name" value="<?php echo $last_name; ?>" /><br />
Email: <input type="email" name="email" value="<?php echo $email; ?>" /><br />
Address: <input type="text" name="address" value="<?php echo $address; ?>" /><br />
Phone: <input type="text" name="phone" value="<?php echo $phone; ?>" /><br>
Password: <input type="password" name="password" /><br />
Confirm Password: <input type="password" name="cpassword" /><br />
<button type="submit" name="submit">Register</button>


<p> Have an account?
    <a href="index.php">Login Here</a>
</p>

</form>
=======
    <h1>Register</h1>
    <form action="" method="POST">
        
        <p></p>
        <br />
        First Name: <input type="text" name="first_name" value="<?php echo $first_name; ?>" /><br />
        Last Name: <input type="text" name="lname" value="<?php echo $lname; ?>" /><br />
        Email: <input type="email" name="email" value="<?php echo $email; ?>" /><br />
        Address: <input type="text" name="address" value="<?php echo $address; ?>" /><br />
        Phone: <input type="text" name="phone" value="<?php echo $phone; ?>" /> <br />
        Password: <input type="password" name="password" /><br>
        Confirm Password: <input type="password" name="cpassword" /><br>
        
        <button name="submit">Register</button>


        <p> Have an account?
            <a href="index.php">Login Here</a>
        </p>

    </form>
>>>>>>> fcf7d96062fc8ff2a7fef6f01e6148f5ec013743

</body>
</html>