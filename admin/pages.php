
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
  #he{
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align:center
  }

</style>

</head>
<?php
include 'conn.php';
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
<body style="color:black">
<div id="header" >
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active="pages";
 include 'sidebar.php'; ?>

</div>
<div id="content" >
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Manage Page Data</h1>

        </div>

      </div>
      <hr>
      <?php
      $limit = 3;
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = 1;
      }
      $offset = ($page - 1) * $limit;
      $count=$offset+1;
        $sql= "select * from pages LIMIT {$offset},{$limit} ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)   {
       ?>

       <div class="table-responsive">
      <table class="table table-bordered" style="text-align:center">
          <thead style="text-align:center">
          <th style="text-align:center">S.no</th>
          <th style="text-align:center">Page Name</th>
          <th style="text-align:center">Page Type</th>
          <th style="text-align:center">Page Data</th>
          <th style="text-align:center">Edit Page</th>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td ><?php echo  $count++; ?></td>
                  <td ><?php echo $row['page_name']; ?></td>
                  <td ><?php echo $row['page_type']; ?></td>
                  <td id="example" style="text-align:left"><div style="width:100%; max-height:110px; overflow:auto"><?php echo $row['page_data']; ?></div></td>
                    <td id="he" style="width:100px;">
                    <a style="background-color:aqua" href='update_page_details.php?type=<?php echo $row['page_type'];?>'> <span class="glyphicon glyphicon-edit"></span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
    <?php } ?>

    <div class="table-responsive"style="text-align:center;align:center">
        <?php
        $sql1 = "SELECT * FROM pages";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

        if(mysqli_num_rows($result1) > 0){

          $total_records = mysqli_num_rows($result1);

          $total_page = ceil($total_records / $limit);

          echo '<ul class="pagination admin-pagination">';
          if($page > 1){
            echo '<li><a href="pages.php?page='.($page - 1).'">Prev</a></li>';
          }
          for($i = 1; $i <= $total_page; $i++){
            if($i == $page){
              $active = "active";
            }else{
              $active = "";
            }
            echo '<li class="'.$active.'"><a href="pages.php?page='.$i.'">'.$i.'</a></li>';
          }
          if($total_page > $page){
            echo '<li><a href="pages.php?page='.($page + 1).'">Next</a></li>';
          }

          echo '</ul>';
        }
        ?>
      </div>
  </div>
  </div>
</div>
<?php }
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
</body>
</html>
