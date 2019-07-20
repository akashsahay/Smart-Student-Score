<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \Login\login.php');
}elseif($_SESSION['email'] == "akash@gmail.com"){
  header('url=sealist.php');
}else{
  header('location: \Login\sea.php');
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

<style>
  .button {
  background-color: #4158d0; /* Green */
  border: none;
  border-radius: 25px;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
  </style>
</head>
<body>
<!--<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">-->
<div class = "box">
  <?php
    $sql  = "SELECT firstname, lastname, email, year, roll from usermanagement WHERE year = 'SE' AND division = 'a'";
    $res = mysqli_query($connection, $sql);
    $r = mysqli_fetch_assoc($res);
  ?>
   <form action = "updatea.php" method="post" >

<div>
    <div class="col-md-4">
      First Name: <input type="text" name="firstname" class="form-control" value="<?php echo $r['firstname']; ?>" placeholder="First Name">
    </div>
</div>

<div>
    <div class="col-md-4">
      Last Name: <input type="text" name="lastname" class="form-control" value="<?php echo $r['lastname']; ?>" placeholder="Last Name">
    </div>
</div>

<div>
    <div class="col-md-4">
      Year: <input type="text" name="year" class="form-control" value="<?php echo $r['year']; ?>" placeholder="Last Name">
    </div>
</div>

<div>
    <div class="col-md-4">
      Email: <input type="email" name="email" class="form-control" value="<?php echo $r['email']; ?>" disabled>
    </div>
</div>

<div>
    <div class = "col-md-4">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</div>

</form>
        <div class="text-center p-t-136">
					<a class="txt2" href="logout.php" style = "color: #hhh">
						Logout
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
    </div>
<!--</div>-->
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