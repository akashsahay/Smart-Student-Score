<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \Login\login.php');
}
$email = $_SESSION['email'];
?>














<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
	<div class="container-login100">
		<div class="card">
  		<div class="card-header">
    		Featured
  		</div>
  		<div class="card-body">
    		<h5 class="card-title">Second Year Engineering A Division</h5>
    		<p class="card-text">Click the Button below for dislaying the records</p>
    		<a href="sealist.php" class="btn btn-primary">View Details</a>
  		</div>
		  <div class="card-body">
    		<h5 class="card-title">Second Year Engineering B Division</h5>
    		<p class="card-text">Click the Button below for dislaying the records</p>
    		<a href="seblist.php" class="btn btn-primary">View Details</a>
  		</div>
				<div class="text-center p-t-136">
					<a class="txt2" href="logout.php">
						Logout
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
		</div>
	</div>
</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>