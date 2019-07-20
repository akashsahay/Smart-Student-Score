<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \Login\login.php');
}
$email = $_SESSION['email'];
$roll = "";
$roll = $_POST['roll'];

$sql  = "SELECT * from usermanagement WHERE roll = '$roll'";
        $result = $connection->query($sql);
        if($result && (mysqli_num_rows($result) > 0)){
          while($row = mysqli_fetch_assoc($result)){
            $a = $row['attendance'];
            $b = $row['outsideparticipation'];
            $c = $row['unittest'];
            $d = $row['hackathon'];
            $e = $row['statecertificate'];
          }
        }


$response = file_get_contents('https://smart-student-score.herokuapp.com/predict?attendance='.$a.'&participation='.$b.'&marks='.$c.'&hackathon='.$d.'&certificate='.$e.'');
$response = json_decode($response);
$score = round($response->score,1);
$score = $score*10;
























?>
<style type = "text/css">
.outter{
  height:25px;
  width:740px;
  border:solid 1px #000;
  border-radius:50px;
}

.inner{
  height:25px;
  width:<?php print_r($score); ?>%;
  border-right:solid 1px #000;
  border-radius:50px;
  background-color:purple;
}




</style>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="scroll.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body style ="background:#ffcbcb">

<?php
        $sql  = "SELECT * from usermanagement WHERE roll = '$roll'";
        $result = $connection->query($sql);
        if($result && (mysqli_num_rows($result) > 0)){
          while($row = mysqli_fetch_assoc($result)){
            $firstname = $row['firstname']; ?>
          <div class = "row">
            <div class = "col-md-3"></div>
          <div class = "col-md-6" >

          <div>
            <div> <img alt="User Pic" src="<?php if(isset($row['profilepic']) & !empty($row['profilepic'])){ echo $row['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" id="profileimage" class="img-circle img-responsive">
              <div style="color:black;" ><?php echo $firstname; ?></div></div>
            <div class="col-sm-4"></div>
        </div>
        <div>
        
        <div class = "outter">
  <div class = "inner"></div>
</div>
          <p style = "text-align:center;font-size:30px;font-weight: bold;"><?php print_r($score); ?>%</p>
        </div>
          <div class="card" >
            <div class="card-body" style= "color:#hhh">
            <form action="update.php" method = "post">

          <div class="ashish">
              <label style = "width:100;">First Name</label>         
                <input type = "text" name = "firstname" value = "<?php echo  $row["firstname"]; ?>"  >
              <label style = "width:100;">  &nbsp&nbsp&nbsp Last Name</label>
                <input type = "text" name = "lastname" value = "<?php echo  $row["lastname"]; ?>" ><br style = “line-height:100;”>
              <label style = "width:100;" >Email    </label>
                <input type = "text" name = "email" value = "<?php echo  $row["email"]; ?>" >
              <label style = "width:100;">&nbsp&nbsp&nbsp Year     </label>
                <input type = "text" name = "year" value = "<?php echo  $row["year"]; ?>" ><br style = “line-height:100;”>
              <label style = "width:100;">Class Roll     </label>
                <input type = "text" name = "roll" value = "<?php echo  $row["roll"]; ?>"><br style = “line-height:100;”><br>
              <label style = "width:110;">Application_ID </label>    

                <input type = "text" name = "applicationid" value = "<?php echo  $row["applicationid"]; ?>"  >
              <label style = "width:100;">Sem rollno.</label>         
                <input type = "text" name = "semrollno" value = "<?php echo  $row["semrollno"]; ?>"  ><br>
              <label style = "width:100;">Contact number</label>         
                <input type = "text" name = "contactno" value = "<?php echo  $row["contactno"]; ?>"  >
              <label style = "width:100;">Gender</label>         
                <input type = "text" name = "gender" value = "<?php echo  $row["gender"]; ?>"  ><br>
              <label style = "width:100;">DOB</label>         
                <input type = "text" name = "DOB" value = "<?php echo  $row["DOB"]; ?>"  >
              <label style = "width:100;">Blood Group</label>         
                <input type = "text" name = "bloodgroup" value = "<?php echo  $row["bloodgroup"]; ?>"  ><br>

                <label style = "width:100;">Local Address</label>         
                <input type = "text" name = "localaddress" value = "<?php echo  $row["localaddress"]; ?>"  >
<!--
                <label style = "width:100;">Permanent Address</label>         
                <input type = "textarea" name = "permanenetaddress" value = ""  ><br>
            -->

                <label style = "width:100;">Mother's Name</label>         
                <input type = "text" name = "mothername" value = "<?php echo  $row["mothername"]; ?>"  >

                <label style = "width:100;">Father's Name</label>         
                <input type = "text" name = "fathername" value = "<?php echo  $row["fathername"]; ?>"  ><br>

                <label style = "width:100;">Parent Email</label>         
                <input type = "text" name = "parentemail" value = "<?php echo  $row["parentemail"]; ?>"  >

                <label style = "width:100;">Parent contact</label>         
                <input type = "text" name = "parentcontact" value = "<?php echo  $row["parentcontact"]; ?>"  ><br>

                <label style = "width:100;">Father's Occupation</label>         
                <input type = "text" name = "fatheroccupation" value = "<?php echo  $row["fatheroccupation"]; ?>"  >

                <label style = "width:100;">Mother's Occupation</label>         
                <input type = "text" name = "motheroccupation" value = "<?php echo  $row["motheroccupation"]; ?>"  ><br>

                <label style = "width:100;">Attendance</label>         
                <input type = "text" name = "attendance" value = "<?php echo  $row["attendance"]; ?>"  >

                <label style = "width:100;">Number Of Outside Participation Certificate</label>         
                <input type = "text" name = "outsideparticipation" value = "<?php echo  $row["outsideparticipation"]; ?>"  ><br>

                <label style = "width:100;">Number Of Outside Excellence Certificate</label>         
                <input type = "text" name = "outsideexcellence" value = "<?php echo  $row["outsideexcellence"]; ?>"  >

                <label style = "width:100;">UnitTest Marks</label>         
                <input type = "text" name = "unittest" value = "<?php echo  $row["unittest"]; ?>"  ><br>

                <label style = "width:100;">Hackathon Participation Certificate</label>         
                <input type = "text" name = "hackathon" value = "<?php echo  $row["hackathon"]; ?>"  >

                <label style = "width:100;">State/National Certificate</label>         
                <input type = "text" name = "statecertificate" value = "<?php echo  $row["statecertificate"]; ?>"  ><br>
                <label style = "width:100;">division </label>         
                <input type = "text" name = "statecertificate" value = "<?php echo  $row["division"]; ?>"  ><br>

               <center><input type="submit" value = "Update" style="

background-color: #800080;
border: none;
border-radius:50px;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;"

</style></center>
               </div>
               <div class = "col-md-3"></div>
      </div>
    </form>
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
					<a class="txt2" href="logout.php" style = "color: black">
						Logout
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
</body>
</html>