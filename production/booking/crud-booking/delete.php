<?php
$id = $_POST['booking_id'];
echo $id;
include '../../../public/function.php';
  $conn = PDOConnector();
  $sql = "DELETE FROM booking WHERE booking_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
  $conn = "";
?>
