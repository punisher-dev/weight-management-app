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
    <?php echo "<h1> Hello " . $sess . " <br /> Your Macros are: <br /> Calories: " . $calories . "Kcal <br /> Protein: " . $protein ."g <br /> Fat: " .$fat . "g <br /> Carbohydrates: " . $carbohydrates . "g</h1>"; ?>
    <form action="" method="POST">
      <h2>You can Search for meals in accordance to your daily Calories:</h2><br />
        <input type="text" name="search" />
        <button type="submit" name="submit">Search</button>
    </form> <br />
    <a href="Logout.php">Log Out</a>
</body>
</html>



<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://edamam-recipe-search.p.rapidapi.com/search?q=chicken",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: edamam-recipe-search.p.rapidapi.com",
		"x-rapidapi-key: 360666ae58msh949da77ef1969dfp14fff7jsn360416b93979"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

?>