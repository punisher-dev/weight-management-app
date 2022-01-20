<?php 
session_start();

if(!isset($_SESSION['first_name'])){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <!-- <p>SESSION</p>
    <pre>print_r($_SESSION) </pre> -->
    <?php echo "<h1>Welcome " . $_SESSION['first_name'] . "</h1>"; ?>

    
    <a href="Logout.php">Log Out</a>
</body>
</html>