<?php

include 'Config.php';

session_start();

error_reporting(0);

$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];
$email = $_GET['subject'];


if ((isset($_SESSION['user_id'])) && (($_SESSION['user_id']) == 1)) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from users where email= :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $fetch = $stmt->fetchAll();
    
} else {
  header("Location: not_allowed.php");
}

foreach($fetch as $item){
        $actual_user_id = $item->user_id;
         $first_name = $item->first_name;
          $last_name = $item->last_name;
          $email = $item->email;
          $address = $item->address;
          $phone = $item->phone;
          break;
}

if ((isset($_SESSION['user_id'])) && (($_SESSION['user_id']) == 1)) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from user_data where user_id= :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $actual_user_id]);
    $fetch = $stmt->fetchAll();    
} else {
  header("Location: not_allowed.php");
}

foreach($fetch as $item){
    $weight = $item->weight;
    $height = $item->height;
    $age = $item->age;
    $sex = $item->sex;
    $activity = $item->activity;
    $goal = $item->goal;
    break;
}

if ((isset($_SESSION['user_id'])) && (($_SESSION['user_id']) == 1)) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from macros where user_id= :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $actual_user_id]);
    $fetch = $stmt->fetchAll();
    
} else {
  header("Location: not_allowed.php");
}

foreach($fetch as $item){
    $calories = $item->calories;
    $protein = $item->protein;
    $fat = $item->fat;
    $carbohydrates = $item->carbohydrates;
    break;
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

    <h1> Complete User Info</h1><br />
    <div class='account'>

    <div>

    <div> First Name: <?php echo $first_name ?> </div><br /> 
    

    <div> Last Name: <?php echo $last_name ?> </div><br /> 


    <div>Email: <?php echo $email ?></div><br /> 


    <div>Address: <?php echo $address ?></div><br /> 


    <div>Phone: <?php echo $phone ?></div><br /> 

    <div>Weight: <?php echo $weight ?></div><br /> 
    
    <div>Height: <?php echo $height ?></div><br /> 

    <div>Age: <?php echo $age ?></div><br /> 

    <div>Sex: <?php echo $sex ?></div><br /> 

    <div>Activity: <?php echo $activity ?></div><br /> 

    <div>Goal: <?php echo $goal ?></div><br /> 

    <div>Calories: <?php echo $calories ?></div><br /> 

    <div>Protein: <?php echo $protein ?></div><br /> 

    <div>Fat: <?php echo $fat ?></div><br /> 

    <div>Carbohydrates: <?php echo $carbohydrates ?></div><br /> 

    </div><br/> 

    <a href="admin.php"><button class="btn btn-secondary" type="button">Back</button></a><br /> 
                    

<a href='Logout.php'>Log Out</a>
</div>
    

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>



