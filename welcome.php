<?php 
include 'Config.php';

session_start();

error_reporting(0);

if(!isset($_SESSION['first_name'])){
    header("Location: index.php");
}

$sess = $_SESSION['first_name'];

$user_id = '';
$weight = '';
$height = '';
$age = '';
$sex = '';
$activity = '';
$goal = '';


if(!isset($_POST['submit'])){

    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $activity = $_POST['activity'];
    $goal = $_POST['goal'];

    if($weight > 0 && $height > 0 && $age > 0){

    $sql = "SELECT * FROM users WHERE first_name='$sess'";
    $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['user_id'];
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO user_data(user_id, weight, height, age, sex, activity, goal)
            VALUES('$user_id', '$weight', '$height', '$age', '$sex', '$activity', '$goal')";

            $result = mysqli_query($conn, $sql);

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
    echo "<script> alert('Welcome " . $sess . "')</script>";
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
    <title>Welcome</title>
</head>
<body>
<?php echo "<h1>Welcome " . $sess . "</h1>"; ?>
        <form action="" method="POST">
            Weight: <input type="text" name="weight" id="weight" /><br />
            Height: <input type="text" name="height" id="height" /><br />
            Age:    <input type="text" name="age" id="age" /><br /> 
                    <label for="sex">Sex:</label><br /> 
            Male:    <input type="radio" name="sex" id="male" value="male" />
            Female:  <input type="radio" name="sex" id="female" value="female" /> <br />
                    <label for="activity">Activity:</label>
                    <select name="activity" id="activity">
                        <option value="sedentary">Sedentary</option>
                        <option value="light">Light: 1-3 times a week</option>
                        <option value="moderate">Moderate: 4-5 times a week</option>
                        <option value="active">Active: Intense 3-4 times a week</option>
                        <option value="very-active">Very Active: Intense 6-7 times a week</option>
                        <option value="extra-active">Extra Active</option>
                    </select> <br />
                    <label for="goal">Goal:</label><br /> 
        Loose Weight: <input type="radio" name="goal" id="loose" value="loose" />
        Gain Weight:  <input type="radio" name="goal" id="gain" value="gain" /> <br />
                    <input type="submit" value="submit" /> <br />
                    <a href="Logout.php">Log Out</a>
        </form>
</body>
</html>


