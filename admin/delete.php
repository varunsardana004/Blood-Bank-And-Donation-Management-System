<?php
include '../conn.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM donor_details where donor_id={$donor_id}";
$result=$db->prepare($sql);
$result->execute();

header("Location: donor_list.php");

$result->closeCursor();
 ?>
