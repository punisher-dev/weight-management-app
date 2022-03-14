<?php 
include 'Config.php';

session_start();

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