<?php

include 'Config.php';

session_start();

error_reporting(0);

$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];


if ((isset($_SESSION['user_id'])) && (($_SESSION['user_id']) == 1)) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from users";
    $stmt = $conn->query($sql);
} else {
  header("Location: not_allowed.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Account</title>
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Macros</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item"><a class="nav-link active" href="admin.php">Admin</a></li>
    </ul>
  </div>
  </div>
  </nav>
  </header>
<div class="wrapper">
<div class="card">

    <h1> Hello </h1><br />
    <div class='account'>

    <div><?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<a href='user_info.php?subject=" . $row['email'] . "'><button type='button'>" . $row['email'] . "</button></a><br>";
} ?> </div><br/> 

<a href='Logout.php'>Log Out</a>
</div>
    

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>



