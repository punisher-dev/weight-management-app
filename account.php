<?php

include 'Config.php';

session_start();

$sess = $_SESSION['first_name'];
$user_id = $_SESSION['user_id'];

  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "select * from users where user_id=".$user_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $address = $row['address'];
    $phone = $row['phone'];

    if(isset($_POST['submit'])){
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
    } else {
      $errorMsg = 'Something went wrong';
    }


    if(!isset($errorMsg)){
			$sql = "update users
									set first_name = '".$first_name."',
                  last_name = '".$last_name."',
                  email = '".$email."',
                  address = '".$address."',
                  phone = '".$phone."'
					where user_id=".$user_id;
			$result = mysqli_query($conn, $sql);
			if($result){
				echo "<script>alert('Updated Successfully.')</script>";
				header('Location:account.php');
			}else{
				$errorMsg = 'Something went wrong';
			} 
    }else {
        $errorMsg = 'Something went wrong';
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
    <script>
$(document).ready(function(){
  $("#show").click(function(e){
    e.preventDefault();
    $(".shown").show();
  });
});

$(document).ready(function(){
  $("#show").click(function(e){
    e.preventDefault();
    $(".edit").hide();
  });
});
</script>
    <title>Account</title>
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
    <strong> Your Account info: </strong><br />
    <div> First Name: " . $first_name . "</div><br /> 
    
    
    <div class='shown hidden mb-3'>
            <input class='form-control' type='text' name='first_name' placeholder='First Name' value='" . $row['first_name'] . "' />
    </div>

    <div> Last Name: " . $last_name . " </div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='text' name='last_name' placeholder='Last Name' value='" . $row['last_name'] . "' />
</div>

    <div>Email: " . $email ."</div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='email' name='email' placeholder='Email' value='" . $row['email'] . "' />
</div>

    <div>Address: " .$address . "</div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='text' name='address' placeholder='Address' value='" . $row['address'] . "' />
</div>

    <div>Phone: " . $phone . "</div><br /> 

    <div class='shown hidden mb-3'>
    <input class='form-control' type='text' name='phone' placeholder='Phone' value='" . $row['phone'] . "' />
</div><br /> 
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



