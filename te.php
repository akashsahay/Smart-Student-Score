<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \Login\login.php');
}
$email = $_SESSION['email'];
?>





