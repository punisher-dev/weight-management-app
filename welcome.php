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
<<<<<<< HEAD
    <!-- <p>SESSION</p>
    <pre>print_r($_SESSION) </pre> -->
=======
    <p>SESSION</p>
    <pre><?php print_r($_SESSION) ?></pre>
>>>>>>> fcf7d96062fc8ff2a7fef6f01e6148f5ec013743
    <?php echo "<h1>Welcome " . $_SESSION['first_name'] . "</h1>"; ?>

    
    <a href="Logout.php">Log Out</a>
</body>
</html>