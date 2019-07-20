<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \login.php');
}
$username = $_SESSION['email'];
$email = $_SESSION['email'];
$sql = "SELECT * from `usermanagement` WHERE email='$username'";
$res = mysqli_query($connection,$sql);
$r = mysqli_fetch_assoc($res);
$profilepic = $r['profilepic'];
if (file_exists($profilepic)) {
  if(unlink($profilepic)){
    $query = "UPDATE `usermanagement` SET profilepic='' WHERE email='$username'";
    $qres = mysqli_query($connection,$query);
      if ($qres) {
        header("location: upload.php");
      }
  }
}else {
  $query = "UPDATE `usermanagement` SET profilepic='' WHERE email='$username'";
  $qres = mysqli_query($connection,$query);
    if ($qres) {
      header('location: upload.php');
    }
}
?>