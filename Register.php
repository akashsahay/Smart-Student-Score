<?php

    $firstname = 'a' ;
    $lastname = 'a' ;
    $year = 'a' ;
    $division = 'a' ;
    $email = 'a' ;
	$smsg = "Registration Successfull";
	$fmsg = "Registration UnSuccessfull";

require_once('connect.php');
if (isset($_POST) && !empty($_POST)) {
  $firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
  $lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
  $year = mysqli_real_escape_string($connection,$_POST['year']);
  $division = mysqli_real_escape_string($connection,$_POST['div']);
	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$roll = mysqli_real_escape_string($connection,$_POST['roll']);
	$password = mysqli_real_escape_string($connection,$_POST['pass']);
	$password = md5($password);

  $email1 = "SELECT * from `usermanagement` WHERE email = '$email'";
  $emailres = mysqli_query($connection,$email1);
  if ($emailres && mysqli_num_rows($emailres) > 0) {
    $fmsg1 = "Username already exists Please try with a different username";
  }else{
    $sql = "INSERT into `usermanagement`(firstname,lastname,year,division,email,password,roll) VALUES('$firstname','$lastname','$year','$division','$email','$password','$roll')";
    if (mysqli_query($connection,$sql)) {
		 $smsg =  "Registration Successfull";
		  if(isset($smsg)) { ?><div class="alert alert-success" role="alert"><?php echo $smsg?></div><?php } ?>
<?php 
}else{
	$fmsg = "UnSuccessfull";
	 if(isset($fmsg)) { ?><div class="alert alert-danger" role="alert"><?php echo $fmsg?></div><?php } ?>
	<?php 
	
}
  }
}


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

       
       
		<?php if(isset($fmsg1)) { ?><div class="alert alert-danger" role="alert"><?php echo $fmsg1?></div><?php } ?>
			<div class="wrap-login100" >
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="Register.php">
					<span class="login100-form-title">
						Registration
					</span>

					
											<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="firstname" placeholder="First Name">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>


											<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="lastname" placeholder="Last Name">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>


											<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="year" placeholder="Year">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>


											<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Division">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="email" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="number" name="roll" placeholder="Roll Number">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
<!--
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Application-ID">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Sem Roll No">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Contact Number">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Gender">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Date Of Birth">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Blood Group">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Local Address">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Permanent Address">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Mother's Name">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Father's Name">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="Parent's Contact">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="fatheroccuation">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="motheroccuation">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="attendance">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="total no. of outsidearticiation">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="outsideexcellence">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="unit test marks">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="No. of hackathon">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="div" placeholder="State/National certificates">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</span>
						</div>
-->
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
							back to login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
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