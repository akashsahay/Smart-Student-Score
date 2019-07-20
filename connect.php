<?php
$connection = mysqli_connect("localhost","root","","test1");
if (mysqli_connect_errno()) {
  echo "Failed to connect".mysqli_connect_error();
}
?>