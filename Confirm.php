<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
require_once('Config.php');

$fname = $lname = $email = $address = $phone = $password = $cpassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $address = test_input($_POST["address"]);
    $phone = test_input($_POST["phone"]); 
    $password = test_input($_POST["password"]); 
    $cpassword = test_input($_POST["cpassword"]); 
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "<h1>Please Confirm your entries</h1>";
echo "Name: " . $fname . "<br>";
echo "Last Name: " . $lname . "<br>";
echo "Email: " .$email . "<br>";
echo "Address: " .$address . "<br>";
echo "Phone: " .$phone . "<br>";
echo "Password: " .$password . "<br>";
echo "Confirm Password: " .$cpassword . "<br>";
echo "<a href='Confirm.php' class='confirm'>Confirm</a>";
exit();
?>

<a href="confirm" class="confirm">Confirm</a>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
  $("a.confirm").click(function(){
    return


<?php
if(!isset($errorMsg)){
    $sql = "insert into users(FirstName, LastName, Email, Address, Phone, Password)
            values('".$fname."', '".$lname."', '".$email."', '".$address."', '".$phone."', '".$password."')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: Login.php');
    }else{
        $errorMsg = 'Error '.mysqli_error($conn);
        header('Location: error.php');
    }
}else{
    $errorMsg = 'Error '.mysqli_error($conn);
            header('Location: error.php');
}
?>

});
});
</script>


</body>
</html>