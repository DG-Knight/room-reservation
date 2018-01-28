<?php
$id = $_POST['user_id'];
echo $id;
include '../../../public/function.php';
  $conn = PDOConnector();
  $sql = "DELETE FROM users WHERE user_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
  $conn = "";
?>
