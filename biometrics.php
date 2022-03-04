<?php

include 'Config.php';

session_start();

$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];


  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from user_data where user_id=:user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    $result = $stmt->rowCount();
    $fetch = $stmt->fetchAll();

    foreach($fetch as $item){
      $weight = $item->weight;
      $height = $item->height;
      $age = $item->age;
      $sex = $item->sex;
      $activity = $item->activity;
      $goal = $item->goal;
      break;
  }
}

    if(isset($_POST['submit'])){
      $weight = $_POST['weight'];
      $height = $_POST['height'];
      $age = $_POST['age'];
      $activity = $_POST['activity'];
      $goal = $_POST['goal'];
    } else {
      $errorMsg = 'Something went wrong';
    }


    if(!isset($errorMsg)){
			$sql = "update user_data
									set weight = :weight,
                  height = :height,
                  age = :age,
                  activity = :activity,
                  goal = :goal
					where user_id=:user_id";
          $stmt = $conn->prepare($sql);
          $stmt->execute(['weight' => $weight, 'height' => $height, 'age' => $age, 'activity' => $activity, 'goal' => $goal, 'user_id' => $user_id]);
          $result = $stmt->rowCount();


			if($result){
				echo "<script>alert('Updated Successfully.')</script>";
				header('Location:meal.php');
			}else{
				$errorMsg = 'Something went wrong';
			} 
    }else {
        $errorMsg = 'Something went wrong';
      }

      // _______________________________________

      $calculator = ((10*$weight)+(6.25*$height)-(5*$age));

      
    if($sex == 'male'){
      $sexValue = $calculator + 5;
  } else {
    $sexValue = $calculator - 161;
  }


  if($activity == 'sedentary'){
      $activity = 20;
      $activity_name = 'sedentary';
  }elseif($activity == 'light'){
      $activity = 37.5;
      $activity_name = 'light';
  }elseif($activity == 'moderate'){
      $activity = 46.5;
      $activity_name = 'moderate';
  }elseif($activity == 'active'){
      $activity = 55;
      $activity_name = 'active';
  }elseif($activity == 'very-active'){
      $activity = 72.5;
      $activity_name = 'very-active';
  } else {
      $activity = 90;
      $activity_name = 'extra-active';
  }

if($goal == 'loose'){
  $goal = $sexValue - 500;
  $goal_name = 'loose';
} else {
  $goal = $sexValue + 500;
  $goal_name = 'gain';
}


  $calories = floor((($activity * $sexValue)/100) + $goal);
  $protein = $weight * 2;
  $fat = floor((($calories/100)*25)/9);
  $carbohydrates = floor(($calories - (($protein * 4) + ($fat * 9)))/4);


      if(!isset($errorMsg)){
        $sql = "update macros
                    set calories = :calories,
                    protein = :protein,
                    fat = :fat,
                    carbohydrates = :carbohydrates
            where user_id=:user_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['calories' => $calories, 'protein' => $protein, 'fat' => $fat, 'carbohydrates' => $carbohydrates, 'user_id' => $user_id]);
            $result = $stmt->rowCount();

        if($result){
          echo "<script>alert('Updated Successfully.')</script>";
          header('Location:meal.php');
        }else{
          $errorMsg = 'Something went wrong';
        } 
      }else {
          $errorMsg = 'Something went wrong';
        }

        // print_r($weight, $height, $age, $sex, $activity, $goal, $calculator);


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
    <script>
$(document).ready(function(){
  $("#show").click(function(e){
    e.preventDefault();
    $(".shown").fadeIn();
  });
});

$(document).ready(function(){
  $("#show").click(function(e){
    e.preventDefault();
    $(".edit").hide();
  });
});


</script>
    <title>Biometrics</title>
</head>
<body>
  
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="meal.php">Macros</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item"><a class="nav-link active" href="account.php">Account</a></li>
      <li class="nav-item"><a class="nav-link active" href="biometrics.php">Biometrics</a></li>
      <li class="nav-item"><a class="nav-link active" href="meal.php">Macros</a></li>
      <li class="nav-item"><a class="nav-link active" href="mealPlan.php">Meal Plan</a></li>
    </ul>
  </div>
  </div>
  </nav>
  </header>
<div class="wrapper">
<div class="card">
    <?php echo 
    "<h1> Hello " . $sess . " </h1><br />
    <div class='account'>
    <form action='' method='POST' >
    <strong> Your Biometrics are: </strong><br />
    <div> Weight: " . $weight . "Kg </div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='text' name='weight' placeholder='Weight' value='" . $weight . "' />
</div>

    <div> Height: " . $height . "cm </div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='text' name='height' placeholder='Height' value='" . $height . "' />
</div>

    <div>Age: " . $age ."</div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='text' name='age' placeholder='Age' value='" . $age . "' />
</div>

    <div>Sex: " .$sex . "</div><br /> 

    <div>Activity: " . $activity_name . " </div><br />

    <div class='shown hidden mb-3'>
    <label for='activity' class='form-label'>Activity*:</label>
    <select class='form-select' name='activity' id='activity'>
        <option value='" . $activity_name . "'>" . $activity_name . "</option>
        <option value='sedentary'>Sedentary</option>
        <option value='light'>Light: 1-3 times a week</option>
        <option value='moderate'>Moderate: 3-4 times a week</option>
        <option value='active'>Active: 4-5 times a week</option>
        <option value='very-active'>Very Active: Intense 6-7 times a week</option>
        <option value='extra-active'>Extra Active</option>
    </select>
</div>


    <div>Goal: " . $goal_name . " weight</div><br />

    <div class='shown hidden mb-3'>
    <label for='goal' class='form-label'>Goal*:</label>
    <select class='form-select' name='goal' id='goal'>
        <option value='" . $goal_name . "'>" . $goal_name . "</option>
        <option value='loose'>Loose Weight</option>
        <option value='gain'>Gain Weight</option>
        </select>
        </div>

        <button id='show' class='btn edit btn-secondary' name='edit'>Edit</button>
<button class='hidden shown btn btn-secondary' type='submit' name='submit'>Submit</button>
<button class='hidden shown btn btn-secondary'>Back</button>
<a href='Logout.php'>Log Out</a>
</form>
</div>"; ?>
    
    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>



