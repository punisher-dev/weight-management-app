<?php 
include 'Config.php';

session_start();

if(!isset($_SESSION['first_name'])){
    header("Location: index.php");
}

$sess = $_SESSION['first_name'];

print_r($sess);

$weight = '';
$height = '';
$age = '';
$sex = '';
$activity = '';
$goal = '';
$calories = '';
$protein = '';
$fat = '';
$carbohydrates = '';


if(isset($_POST['submit'])){

    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $activity = $_POST['activity'];
    $goal = $_POST['goal'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $fat = $_POST['fat'];
    $carbohydrates = $_POST['carbohydrates'];

    $sql = "SELECT user_id FROM users WHERE first_name='$sess'";
    $result = mysqli_query($conn, $sql);

    $id = $result[''];


}

print_r($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="body">
   
<section>


    <div class="bmr">
    <?php echo "<h1>Welcome " . $_SESSION['first_name'] . "</h1>"; ?>
        <h2>BMR</h2>
        
        <form action="" method="POST">
            <p>Weight(kg)</p>
            <input type="text" id="weight" name="weight"></input>
        
        <br></br>
        <p>Height(cm)</p>
        <input type="text" id="height" name="height"></input>

            <br></br>
            <p>Age</p>
            <input type="text" id="age" name="age"></input>

            <br></br>
            <h3>Sex</h3>
            <form name="sexChecked">

            <input id="female" name="sex" type="radio" value="161"><label for="female">Female</label></input>
            <br></br>
            
            <input id="male" name="sex" type="radio" value="5"><label for="male">Male</label></input>
        </form>
            
            <br></br>
            <br></br>

            <h3>Activity</h3>
            <form name = "activityChecked">
                
            <input id="sedentary" name="activity" type="radio" value="20"><label for="sedentary">Sedentary</label></input>
            
            <br></br>
            <input id="light" name="activity" type="radio" value="37.5"><label for="light">Light: 1-3 times a week</label></input>
            <br></br>
            <input id="moderate" name="activity" type="radio" value="46.5"><label for="moderate">Moderate: 4-5 times a week</label></input>
            <br></br>
            <input id="active" name="activity" type="radio" value="55"><label for="active">Active: Intense 3-4 times a week</label></input>
            <br></br>
            <input id="veryActive" name="activity" type="radio" value="72.5"><label for="veryActive">Very Active: Intense 6-7 times a week</label></input>
            <br></br>
            <input id="extraActive" name="activity" type="radio" value="90"><label for="extraActive">Extra Active</label></input>
        </form>
            
            <br></br>
            <br></br>

            <h3>Goal</h3>

            <input id="looseWeight" name="goal" type="radio" value="500"><label for="looseWeight">I want to loose weight</label></input>
            <br></br>
            
            <input id="gainWeight" name="goal" type="radio" value="500"><label for="gainWeight">I want to gain weight</label></input>
            
            
            <br></br>
            <br></br>
            
            <h3>Macros</h3>
            <p id="result"></p>
            <button type="submit" onClick="macros()" class="btn btn-light">RESULT</button>

            <a href="Logout.php">Log Out</a>

    </div>
    </form>
</section>


    <script src="index.js" charset="utf-8"></script>
</body>         
</html>