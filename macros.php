<?php
include 'Config.php';

session_start();

$sess = $_SESSION['first_name'];

  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from user_data where user_id=".$user_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

    $weight = $row['weight'];
    $height = $row['height'];
    $age = $row['age'];
    $sex = $row['sex'];
    $activity = $row['activity'];
    $goal = $row['goal'];
    $calculator = ((10*$weight)+(6.25*$height)-(5*$age));

    if($sex == 'male'){
        $sex = $calculator + 5;
    } else {
        $sex = $calculator - 161;
    }


    if($activity == 'sedentary'){
        $activity = 20;
    }elseif($activity == 'light'){
        $activity = 37.5;
    }elseif($activity == 'moderate'){
        $activity = 46.5;
    }elseif($activity == 'active'){
        $activity = 55;
    }elseif($activity == 'very-active'){
        $activity = 72.5;
    } else {
        $activity = 90;
    }

if($goal == 'loose'){
    $goal = $sex - 500;
} else {
    $goal = $sex + 500;
}


    $calories = floor((($activity * $sex)/100) + $goal);
    $protein = $weight * 2;
    $fat = floor((($calories/100)*25)/9);
    $carbohydrates = floor(($calories - (($protein * 4) + ($fat * 9)))/4);

if(!isset($_POST['submit'])){
    $sql = "INSERT INTO macros(user_id, calories, protein, fat, carbohydrates)
            VALUES('$user_id', '$calories', '$protein', '$fat', '$carbohydrates')";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: meal.php");
                $user_id = "";
                $calories = "";
                $protein = "";
                $fat = "";
                $carbohydrates = "";
            } else {
                echo "<script>alert('Something went wrong.')</script>";
            }
} else {
    echo "<script> alert('error.')</script>";
}

?>