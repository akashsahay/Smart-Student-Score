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
<div class="limiter">
<div class="container-login100">
<!--<div class="wrap-login100">-->
<div class = "box">
<table class="table table-bordered" style = "background-color: #fff">
  <thead>
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Year</th>
      <th scope="col">Roll No.</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql  = "SELECT firstname, lastname, email, year, roll from usermanagement WHERE email = '$email' and division = 'b'";
        $result = $connection->query($sql);
        if($result && (mysqli_num_rows($result) > 0)){
          while($row = mysqli_fetch_assoc($result)){
          print_r("<tr><form action = viewone.php method = POST ><td><input type = text name = firstname value = '".$row["firstname"]."'</td><td><input type = text name = lastname value = '".$row["lastname"]."'</td><td><input type = email name = email value = '" .$row["email"]. "'</td><td><input type = text name = year value = '" .$row["year"]. "'</td><td><input type = submit class = button value = Update></td><td><input type = hidden name = roll value ='".$row["roll"]."'</td></form></tr>");
        }
        echo "</tbody>";
      }else{
        echo "0 results";
      }
    ?>
</table>
        <div class="text-center p-t-136">
					<a class="txt2" href="logout.php" style = "color: #fff">
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