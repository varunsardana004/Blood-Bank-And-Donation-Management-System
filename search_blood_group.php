<?php
require_once 'conn.php';

$bg=$_POST['blood'];

$sql= "SELECT * FROM donor_details WHERE donor_blood='{$bg}' ORDER BY rand() limit 5";
$stmt = $db->prepare($sql);
$stmt->execute();
  if($stmt->rowCount() > 0)   {
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="row">
    <div class="col-lg-4 col-sm-6 portfolio-item" ><br>
    <div class="card" style="width:300px">
        <img class="card-img-top" src="image\blood_drop_logo.jpg" alt="Card image" style="width:100%;height:300px">
        <div class="card-body">
          <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
          <p class="card-text">
            <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
            <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
            <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
            <b>Age : </b> <?php echo $row['donor_age']; ?><br>
            <b>Address : </b> <?php echo $row['donor_address']; ?><br>
          </p>

        </div>
      </div>
</div>

<?php
  }
  $stmt->closeCursor();
}
  else
  {

      echo '<div class="alert alert-danger">No Donor Found For your search Blood group </div>';

  } ?>
</div>
