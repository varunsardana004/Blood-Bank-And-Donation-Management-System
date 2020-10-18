<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="nicEdit.js"></script>
<style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }

  #area1, #area4{
    width: 70vw;
    min-height: 50vh;
    font-family: tahoma;
  }

  .nicEdit-panel > div > * {
    opacity: 1 !important;
  }


  .nicEdit-buttonContain {
      padding: .5em;
  }
  .nicEdit-panelContain{

  }

  .nicEdit-selectContain{
  margin-top: 8px;
  padding:.5em
  }

   .nicEdit-selectTxt{
       font-family: Tahoma !important;
       font-size: 12px !important;
   }

   .nicEdit-main{
    outline: 0;
  }


}
</style>
</head>

<body style="color:black">

  <?php
  include 'conn.php';
    include 'session.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active =""; 
include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Update Page Details</h1>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Page Details</div>
            <div class="panel-body">

  <form name="updata_page"  method="post">
                <div class="hr-dashed"></div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Selected Page : </label>
                    <?php
                    include 'conn.php';
              switch($_GET['type'])
              {
                    case "aboutus" :
                          echo "About US";
                          break;
                    case "donor" :
                          echo "Why Donate Blood";
                          break;
                    case "needforblood" :
                          echo "The Need For Blood";
                          break;
                    case "needforblood" :
                          echo "The Need For Blood";
                          break;
                    case "bloodtips" :
                          echo "Blood Tips";
                          break;
                    case "whoyouhelp" :
                          echo "Why you could Help";
                          break;
                    case "bloodgroups" :
                          echo "Blood Groups";
                          break;
                    case "universal" :
                          echo "Universal Donors And Recepients";
                          break;
              }

              ?>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">Page Details: </label>
                      <div class="col-sm-4">
                        <div id="sample">

                      <textarea cols="60" rows="10" id="area4" name="data">
                    </textarea>


                    </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4"><br>
 <button class="btn btn-primary" name="submit" type="submit">Update</button>
        </div>
      </div>

    </form>

    </div>
    </div>
    </div>

    </div>



    <?php if(isset($_POST['submit']))
    {
      $type=$_GET['type'];
      $data=$_POST['data'];
      $conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
      $sql= "update pages set page_data='{$data}'where page_type='{$type}'";
      $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
    echo '<div class="alert alert-success"><b>Page Data Updated Successfully.</b></div>';
    }

    ?>

            </div>
          </div>
        </div>
  <?php
 } else {
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

</body>
</html>
