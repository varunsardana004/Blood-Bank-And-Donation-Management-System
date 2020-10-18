<?php include 'session.php'; ?>

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}
</style>
</head>
<?php
include 'conn.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
<body style="color:black">
<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php 
$active="";
include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Change Password</h1>
        </div>
      </div>
          <div class="row">
            <div class="col-md-10">
              <div class="panel panel-default">
                <div class="panel-heading">Password Fields</div>
                <div class="panel-body">
                  <form method="post" name="chngpwd" class="form-horizontal">

                    <div class="form-group" method="post">
                      <label class="col-sm-4 control-label">Current Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="currpassword" id="password" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">New Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>



                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-4">

                        <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>
            </div>

<?php


if(isset($_POST["submit"])){
  $username=$_SESSION['username'];
  $password=mysqli_real_escape_string($conn,$_POST["currpassword"]);
  $sql="select * from admin_info where admin_username='$username'";
  $result=mysqli_query($conn,$sql) or die("query failed.");
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_assoc($result)){
      if($password==$row['admin_password']){

    $newpassword=mysqli_real_escape_string($conn,$_POST["newpassword"]);
    $confpassword=mysqli_real_escape_string($conn,$_POST["confirmpassword"]);

    if($newpassword==$confpassword)
    {
      if($newpassword!=$password)
      {
      $sql1="UPDATE admin_info set admin_password='{$newpassword}' where admin_username='{$username}'";
      $result1=mysqli_query($conn,$sql1) or die("query failed.");
      echo '<div class="alert alert-success alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><b> Password Changed Successfully.</b></div>';
      }
      else {
          echo  '<div class="alert alert-info alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><b>New Password Can not be same as Current Password..</b></div>';
          }
      }

      else {
        echo '<div class="alert alert-warning alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button> <b>New Password and Confirm Password Not Matched!</b></div>';
      }
    }
  else {
    echo '<div class="alert alert-danger alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><b> Current Password not matched!</b></div>';
  }
}
}
}
?>
<?php
}
else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
    ?>
    <form method="post" name="" action="login.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4" style="float:left">

          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
<?php }
 ?>
</div>
</div>
</div>
</body>
</html>
