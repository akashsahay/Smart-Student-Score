<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
    header('location: \Login\login.php');
  }
$email = $_SESSION['email'];


$sql  = "SELECT * from usermanagement WHERE email = $email";
$result = $connection->query($sql);
if($result && (mysqli_num_rows($result) > 0)){
$a = $row['attendance'];
$b = $row['outsideparticipation'];
$c = $row['unittest'];
$d = $row['hackathon'];
$e = $row['statecertificate'];

$response = file_get_contents("https://smart-student-score.herokuapp.com/predict?attendance=$a,outsideparticipation=$b,unittest=$c,hackathon=$d,statecertificate=$e");
$response = json_decode($response);
echo $response;
echo "hello";
}
?>