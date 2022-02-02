<?php

include 'Config.php';

session_start();

$sess = $_SESSION['first_name'];

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
    <title>Document</title>
</head>
<body>
<?php echo "<script>alert('Data entered.')</script>"; ?>
    <?php echo "<h1> Hello " . $sess . " <br /> Your Macros are: <br /> Calories: " . $calories . "Kcal <br /> Protein: " . $protein ."g <br /> Fat: " .$fat . "g <br /> Carbohydrates: " . $carbohydrates . "g</h1>"; ?>
</body>
</html>