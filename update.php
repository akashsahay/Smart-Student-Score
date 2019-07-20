<?php

session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \Login\login.php');
}
$email = $_SESSION['email'];
$roll = "";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$year = $_POST["year"];
$roll = $_POST["roll"];
$semrollno = $_POST["semrollno"];
$contactno = $_POST["contactno"];
$gender = $_POST["gender"];
$DOB = $_POST["DOB"];
$bloodgroup = $_POST["bloodgroup"];
$localaddress = $_POST["localaddress"];
//$permanentaddress = $_POST["permanentaddress"];

$mothername = $_POST["mothername"];
$applicationid = $_POST["applicationid"];
$fathername = $_POST["fathername"];
$parentemail = $_POST["parentemail"];
$parentcontact = $_POST["parentcontact"];
$fatheroccupation = $_POST["fatheroccupation"];
$motheroccupation = $_POST["motheroccupation"];

$attendance = $_POST["attendance"];
$outsideparticipation = $_POST["outsideparticipation"];
$outsideexcellence = $_POST["outsideexcellence"];
$unittest = $_POST["unittest"];
$hackathon = $_POST["hackathon"];
$statecertificate = $_POST["statecertificate"];

$sql = "UPDATE `usermanagement` SET  firstname = '$firstname', lastname = '$lastname', email = '$email', year = '$year', applicationid = '$applicationid', semrollno = '$semrollno', contactno = '$contactno', gender = '$gender', DOB = '$DOB', bloodgroup = '$bloodgroup', localaddress = '$localaddress', mothername = '$mothername', fathername = '$fathername', parentemail = '$parentemail', parentcontact = '$parentcontact', fatheroccupation = '$fatheroccupation', motheroccupation = '$motheroccupation',
attendance = '$attendance',outsideparticipation = '$outsideparticipation', outsideexcellence = '$outsideexcellence', unittest = '$unittest', hackathon = '$hackathon', statecertificate = '$statecertificate',
roll = '$roll' WHERE roll = '$roll'"; 
if (mysqli_query($connection, $sql)) {?>   
  <div class="alert alert-success" role="alert">Updated succefully redirecting in 5 seconds</div>   
  <?php 
  header('refresh: 3; url =  seblist.php');
} else {    
    echo "Error updating record: " . mysqli_error($connection); 
    }
    
?>