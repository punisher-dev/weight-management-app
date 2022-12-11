<?php
session_start();
include 'Config.php';



$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];

  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from macros where user_id=:user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    $result = $stmt->rowCount();
    $fetch = $stmt->fetchAll();

    foreach($fetch as $item){
      $calories = $item->calories;
      break;
  }
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
    <title>Meal Plan</title>
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
    <div class='macros'>
    <strong> Meal Plan: </strong><br />
    <div>Find easy meals bellow that are in accordance to your caloric goal, which is: <br /></div>
    <strong>". $calories . " Kcal</strong><br />
    <a href='Logout.php'>Log Out</a>
    </div><br />"; ?>
    </div>

    <?php

// $curl = curl_init();

// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/mealplans/generate?targetCalories=". $calories ."&timeFrame=day",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => [
// 		"x-rapidapi-host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com",
// 		"x-rapidapi-key: 360666ae58msh949da77ef1969dfp14fff7jsn360416b93979"
// 	],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	// echo $response;
// }

// $response = json_decode($response);


// echo "<div class='recipe'>";
// foreach($response->meals as $meal) {
//   echo '<div class="card recipecard"><h1>'.$meal->title. '</h1><br />';
//   echo '<strong>Preparation Time: </strong>'.$meal->readyInMinutes. '<br />';
//   echo '<strong>Servings: </strong>'.$meal->servings. '<br />';
//   echo '<button class="btn btn-secondary" onclick=\"location.href='.$meal->sourceUrl.'\" >Recipe</button>
// </div>
// <br />';
// }
// echo "</div>";

?>
<!-- // ----------------------------------------------------------------------- -->


<div class="recipe">
<div class="card recipecard">
  <h1> Mom's Spaghetti </h1>
  <img src="img/spaghetti.jpg" alt="Italian Trulli">
  Preparation Time: 40min <br />
  Servings: 4 <br />
  <button class="btn btn-secondary" name="submit" type="submit">Recipe</button>
</div>
<div class="card recipecard">
  <h1> Mom's Spaghetti </h1>
  <img src="img/spaghetti.jpg" alt="Italian Trulli">
  Preparation Time: 40min <br />
  Servings: 4 <br />
  <button class="btn btn-secondary" name="submit" type="submit">Recipe</button>
</div>
<div class="card recipecard">
  <h1> Mom's Spaghetti </h1>
  <img src="img/spaghetti.jpg" alt="Italian Trulli">
  Preparation Time: 40min <br />
  Servings: 4 <br />
  <button class="btn btn-secondary" name="submit" type="submit">Recipe</button>
</div>
</div>

<!-- // ----------------------------------------------------------------------- -->




</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
