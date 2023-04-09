<?php

require_once '../conn.php';

$que_id = $_GET['id'];
$sql= "DELETE FROM contact_query where query_id={$que_id}";
$result= $db->prepare($sql);
$result->execute();
$result->closeCursor();
?>
