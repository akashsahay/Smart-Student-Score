<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \Login\login.php');
}
$email = $_SESSION['email'];
$roll = "";
$roll = $_POST['roll'];

?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="scroll.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body  style ="background:#ffcbcb">
<?php
        $sql  = "SELECT * from usermanagement WHERE roll = '$roll'";
        $result = $connection->query($sql);
        if($result && (mysqli_num_rows($result) > 0)){
          while($row = mysqli_fetch_assoc($result)){?>
          <div class = "row">
          <div class = "col-md-3"></div>
          <div class = "col-md-6">
          <div>
            <div> <img alt="User Pic" src="<?php if(isset($row['profilepic']) & !empty($row['profilepic'])){ echo $row['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" id="profileimage" class="img-circle img-responsive">
              <div style="color:#999;" ><a href = "upload.php">Upload Profile Pic</a></div></div>
            <div class="col-sm-4"></div>
        </div>

          <div class="card">
            <div class="card-body" style= "color:#hhh">
            <label style = "width:100;">First Name</label>         
                <input type = "text" name = "firstname" value = "<?php echo  $row["firstname"]; ?>" disabled >
              <label style = "width:100;">  &nbsp&nbsp&nbsp Last Name</label>
                <input type = "text" name = "lastname" value = "<?php echo  $row["lastname"]; ?>" disabled><br style = “line-height:100;”>
              <label style = "width:100;" >Email    </label>
                <input type = "text" name = "email" value = "<?php echo  $row["email"]; ?>" disabled >
              <label style = "width:100;">&nbsp&nbsp&nbsp Year     </label>
                <input type = "text" name = "year" value = "<?php echo  $row["year"]; ?>" disabled><br style = “line-height:100;”>
              <label style = "width:100;">Class Roll     </label>
                <input type = "text" name = "roll" value = "<?php echo  $row["roll"]; ?>" disabled ><br style = “line-height:100;”><br>
              <label style = "width:110;">Application_ID </label>    

                <input type = "text" name = "applicationid" value = "<?php echo  $row["applicationid"]; ?>" disabled >
              <label style = "width:100;">Sem rollno.</label>         
                <input type = "text" name = "semrollno" value = "<?php echo  $row["semrollno"]; ?>"  disabled><br>
              <label style = "width:100;">Contact number</label>         
                <input type = "text" name = "contactno" value = "<?php echo  $row["contactno"]; ?>" disabled >
              <label style = "width:100;">Gender</label>         
                <input type = "text" name = "gender" value = "<?php echo  $row["gender"]; ?>" disabled ><br>
              <label style = "width:100;">DOB</label>         
                <input type = "text" name = "DOB" value = "<?php echo  $row["DOB"]; ?>" disabled >
              <label style = "width:100;">Blood Group</label>         
                <input type = "text" name = "bloodgroup" value = "<?php echo  $row["bloodgroup"]; ?>" disabled ><br>

                <label style = "width:100;">Local Address</label>         
                <input type = "text" name = "localaddress" value = "<?php echo  $row["localaddress"]; ?>" disabled >

                <label style = "width:100;">Permanent Address</label>         
                <input type = "textarea" name = "permanenetaddress" value = "<?php echo  $row["peranentaddress"]; ?>" disabled ><br>

                <label style = "width:100;">Mother's Name</label>         
                <input type = "text" name = "mothername" value = "<?php echo  $row["mothername"]; ?>" disabled >

                <label style = "width:100;">Father's Name</label>         
                <input type = "text" name = "fathername" value = "<?php echo  $row["fathername"]; ?>" disabled ><br>

                <label style = "width:100;">Parent Email</label>         
                <input type = "text" name = "parentemail" value = "<?php echo  $row["parentemail"]; ?>" disabled >

                <label style = "width:100;">Parent contact</label>         
                <input type = "text" name = "parentcontact" value = "<?php echo  $row["parentcontact"]; ?>" disabled ><br>

                <label style = "width:100;">Father's Occupation</label>         
                <input type = "text" name = "fatheroccupation" value = "<?php echo  $row["fatheroccupation"]; ?>" disabled >

                <label style = "width:100;">Mother's Occupation</label>         
                <input type = "text" name = "motheroccupation" value = "<?php echo  $row["motheroccupation"]; ?>" disabled ><br>

                <label style = "width:100;">Attendance</label>         
                <input type = "text" name = "attendance" value = "<?php echo  $row["attendance"]; ?>" disabled >

                <label style = "width:100;">Number Of Outside Participation Certificate</label>         
                <input type = "text" name = "outsideparticipation" value = "<?php echo  $row["outsideparticipation"]; ?>" disabled ><br>

                <label style = "width:100;">Number Of Outside Excellence Certificate</label>         
                <input type = "text" name = "outsideexcellence" value = "<?php echo  $row["outsideexcellence"]; ?>" disabled >

                <label style = "width:100;">UnitTest Marks</label>         
                <input type = "text" name = "unittest" value = "<?php echo  $row["unittest"]; ?>"  disabled><br>

                <label style = "width:100;">Hackathon Participation Certificate</label>         
                <input type = "text" name = "hackathon" value = "<?php echo  $row["hackathon"]; ?>" disabled >

                <label style = "width:100;">State/National Certificate</label>         
                <input type = "text" name = "statecertificate" value = "<?php echo  $row["statecertificate"]; ?>" disabled ><br>
                <label style = "width:100;">division </label>         
                <input type = "text" name = "division" value = "<?php echo  $row["division"]; ?>" disabled >

          </div>
          <div class = "col-md-3"></div>
          </div>
        </div>
        </div>
        </div>
            
  <?php
        }
        }else{
        echo "0 results";
      }
    ?>
    <div class="text-center p-t-136">
			<a class="txt2" href="logout.php" style = "color: #hhh">
				Logout
			    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
			</a>
	</div>
</body>
</html>