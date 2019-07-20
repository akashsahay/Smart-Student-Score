<?php
session_start();
require_once('connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: \login.php');
}
$email = $_SESSION['email'];
$username = $_SESSION['email'];
if (isset($_FILES) & !empty($_FILES)) {
  $name = $_FILES['profilepic']['name'];
  $type = $_FILES['profilepic']['type'];
  $size = $_FILES['profilepic']['size'];
  $tmp_name = $_FILES['profilepic']['tmp_name'];
  $ext = substr($name, strpos($name, '.') + 1);
  $maxsize = 500000;
    if (isset($name) & !empty($name)) {
      $location = "Uploads/";
      if(move_uploaded_file($tmp_name, $location.$username.".jpeg")) #function to upload files
      $usql = "UPDATE `usermanagement` set profilepic='$location$username.jpeg' WHERE email='$username'";
      $ures = mysqli_query($connection, $usql);
      if ($ures) {
        $smsg = "Uploaded Successfull";
      }
    }else {
      $fmsg = "please select any image file ";
    }
}
?>





<html>
<head>
<title>Members Area edit Profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="scroll.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
<div class="col-sm-9">
  <?php
    $sql = "SELECT * FROM `usermanagement` WHERE email='$username'";
    $res = mysqli_query($connection, $sql);
    $r = mysqli_fetch_assoc($res);
  ?>
  <?php if(isset($smsg)) { ?><div class="alert alert-success" role="alert"><?php echo $smsg;?></div><?php } ?>
  <?php if(isset($fmsg)) { ?><div class="alert alert-danger" role="alert"><?php echo $fmsg;?></div><?php } ?>
  <?php if(isset($fmsg1)) { ?><div class="alert alert-danger" role="alert"><?php echo $fmsg1;?></div><?php } ?>
<div class="panel panel-default">
<div class="panel-heading"><h4>User Profile</h4></div>
 <div class="panel-body">
   <div class="col-sm-6 col-centered">

        <div>
            <img alt="User Pic" src="<?php if(isset($r['profilepic']) & !empty($r['profilepic'])){ echo $r['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" id="profileimage" class="img-circle img-responsive">
              <div style="color:#999;" ><?php echo $username; ?></a></div>
            </div>
            <div class="col-sm-4"></div>
        </div>

    <form method="post" class="form-horizontal" enctype="multipart/form-data">
          <input type="file" name="profilepic" class="col-md-offset-5" id="upload" accept="image/jpeg">
          <input type="submit" class="btn btn-primary col-md-offset-5" value="Upload" >
          <a href="delete.php" class="btn btn-danger col-md-offset-5">Delete</a>
          <a href="seb.php" class="btn btn-danger col-md-offset-5">Back</a>
    </form>
  </div>
            <!-- /.box-body -->
          </div>
        </div>

 </div>
</div>
</div>
</div>
<div class="text-center p-t-136">
			<a class="txt2" href="logout.php" style = "color: #hhh">
				Logout
			    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
			</a>
	</div>
</body>
</html>