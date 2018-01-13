<?php
$id = $_POST['room_id'];
echo $id;
include '../../public/function.php';
  $conn = PDOConnector();
  $sql = "DELETE FROM rooms WHERE room_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
  $conn = "";
?>
