<?php

include 'Config.php';

session_start();

$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];

  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from macros where user_id=".$user_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

    $calories = $row['calories'];
    $protein = $row['protein'];
    $fat = $row['fat'];
    $carbohydrates = $row['carbohydrates'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Meal</title>
</head>
<body>
<div class="wrapper">
<div class="card">
    <?php echo 
    "<h1> Hello " . $sess . " </h1><br />
    <div class='macros'>
    <strong> Your Macros are: </strong><br />
    <div> Calories: " . $calories . "Kcal </div><br /> 
    <div>Protein: " . $protein ."g </div><br /> 
    <div>Fat: " .$fat . "g </div><br /> 
    <div>Carbohydrates: " . $carbohydrates . "g 
    </div>"; ?>
    
    <a href="Logout.php">Log Out</a>
    </div>
</body>
</div>
</div>
</html>



