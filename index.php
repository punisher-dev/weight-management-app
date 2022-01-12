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
<form action="Confirm.php" method="post" >
First Name: <input type="text" name="fname"><br>
Last Name: <input type="text" name="lname"><br>
Email: <input type="text" name="email"><br>
Address: <input type="text" name="address"><br>
Phone: <input type="text" name="phone"> <br>
Password: <input type="password" name="password"> <br>
Confirm Password: <input type="password" name="cpassword"> <br>
<input type="submit" name="submit" value="Submit">
</form>

<p> Have an account?
    <a href="Login.php">Login Here</a>
</p>

</body>
</html>