<?php
require_once ('componant/config.php');
session_start();
// print_r($_SESSION['id']);

	if(ISSET($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

 
		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' AND `role`='pharmacie' ") ;
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
 
		if($row > 0){
			$_SESSION['pharmacie_id']=$fetch['id'];
            $_SESSION['email']=$fetch['email'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='pharmacie_profile.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='pharmacie_login.php'</script>";
		}
//  print_r($_SESSION['pharmacie_id']);
	}
    
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome css file -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Our css file -->
    <link rel="stylesheet" href="CSS/newframework.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="form text-center">
            <h1 class="text-white">login</h1>
            <form method="post" action="">
                <div class="input-feild">
                    <i class="fa-solid fa-user"></i>
                    <input type="email" name="email" id="email" placeholder="User email" />
                </div>
                <div class="input-feild">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>
                <!-- <input type="submit" value="Login" /> -->
                <center><button name="login" class="btn btn-primary">Login</button></center>

            </form>
        </div>
    </div>
</body>
<!-- Bootstrap js file -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome js file -->
<script src="js/all.min.js"></script>
<!-- Our js file -->
<script src="js/main.js"></script>

</html>