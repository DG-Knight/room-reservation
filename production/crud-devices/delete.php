<?php
$id = $_POST['device_id'];
echo $id;
include '../../public/function.php';
  $conn = PDOConnector();
  $sql = "DELETE FROM devices WHERE device_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
  $conn = "";
?>
