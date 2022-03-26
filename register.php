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

    if(($password == $cpassword) && ($first_name == true) && ($last_name == true) && ($email == true) && ($address == true) && ($phone == true)){
        $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $result = $stmt->rowCount();
       
        if(!$result > 0){

                $sql = "INSERT INTO users(first_name, last_name, email, address, phone, created_at, password)
                        VALUES(:first_name, :last_name, :email, :address, :phone, :created_at, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'address' => $address, 'phone' => $phone, 'created_at' => $created_at, 'password' => $password]);
        header("Location: index.php");
        if($result){
        header("Location: index.php");
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
     echo "<script> alert('Password Not Matched or one of the boxes is not filled, or E-mail already exists.')</script>";

    }
 }

?>