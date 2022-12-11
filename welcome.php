<?php 
session_start();
include 'Config.php';



error_reporting(0);

if(!isset($_SESSION['first_name']) && isset($_SESSION['user_id'])){
    header("Location: index.php");
}

$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];


$sql = "SELECT user_id FROM user_data WHERE user_id= :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$result = $stmt->rowCount();

if($result > 0){
    header("Location: meal.php");
} else{

$user_id = '';
$weight = '';
$height = '';
$age = '';
$sex = '';
$activity = '';
$goal = '';
}

if(!isset($_POST['submit'])){

    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $activity = $_POST['activity'];
    $goal = $_POST['goal'];

    if($weight > 0 && $height > 0 && $age > 0 && !empty($sex)  && !empty($activity) && !empty($goal)){

    $sql = "SELECT * FROM users WHERE first_name= :first_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['first_name' => $sess]);
    $result = $stmt->rowCount();
    $fetch = $stmt->fetchAll();

    foreach($fetch as $item){
        $user_id = $item->user_id;
        break;
    }

        if($result > 0){
            $_SESSION['user_id'] = $user_id;
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO user_data(user_id, weight, height, age, sex, activity, goal)
            VALUES(:user_id, :weight, :height, :age, :sex, :activity, :goal)";

            $stmt = $conn->prepare($sql);
            $stmt->execute(['user_id' => $user_id, 'weight' => $weight, 'height' => $height, 'age' => $age, 'sex' => $sex, 'activity' => $activity, 'goal' => $goal]);
            // header("Location: index.php");


            if($result){
                header("Location: macros.php");
                $user_id = "";
                $weight = "";
                $height = "";
                $age = "";
                $sex = "";
                $activity = "";
                $goal = "";
            } else {
                echo "<script>alert('Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Id not recognized.')</script>";
        }
} else {
    echo "<script> alert('Welcome ". $sess . ", Please Fill in all values in the form!')</script>";
}
} else {
    echo "<script> alert('Please enter a valid value.')</script>";
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
    <title>Welcome</title>
</head>
<body>
<div class="wrapper">
<div class="card">
    <h1>please add your information bellow:</h1>

        <form action="" method="POST">
        <?php echo "<div class='mb-3'><strong>Welcome " . $sess . "!</strong></div>"; ?>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight:*</label>
            <input class="form-control" type="text" name="weight" id="weight" placeholder="Weight" required/>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height:*</label>
            <input class="form-control" type="text" name="height" id="height" placeholder="Height" required/>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age:*</label>
            <input class="form-control" type="text" name="age" id="age" placeholder="Age" required/>
        </div>
        <div class="mb-3">
            <label for="sex" class="form-check-label">Sex:*</label><br /> 
            Male:    <input class="form-check-input" type="radio" name="sex" id="male" value="male" />
            Female:  <input class="form-check-input" type="radio" name="sex" id="female" value="female" />
        </div>
        <div class="mb-3">
                    <label for="activity" class="form-label">Activity*:</label>
                    <select class="form-select" name="activity" id="activity">
                        <option value="sedentary">Sedentary</option>
                        <option value="light">Light: 1-3 times a week</option>
                        <option value="moderate">Moderate: 3-4 times a week</option>
                        <option value="active">Active: 4-5 times a week</option>
                        <option value="very-active">Very Active: Intense 6-7 times a week</option>
                        <option value="extra-active">Extra Active</option>
                    </select>
        </div>
        <div class="mb-3">
                    <label for="goal" class="form-check-label">Goal*:</label><br /> 
        Loose Weight: <input class="form-check-input" type="radio" name="goal" id="loose" value="loose" />
        Gain Weight:  <input class="form-check-input" type="radio" name="goal" id="gain" value="gain" />
        </div>
                    <button class="btn btn-secondary" type="submit" value="submit" >Submit</button><br /> 
                    <a href="Logout.php">Log Out</a>
        </form>

</div>
</div>
</body>
</html>


