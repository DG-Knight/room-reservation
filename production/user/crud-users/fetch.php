<?php
$id = $_POST['user_id'];
include '../../../public/function.php';
  try {
    $conn = PDOConnector();
    $sql = "SELECT * FROM users WHERE user_id=$id";
    $query = $conn->prepare($sql);
    $query ->execute();
  } catch (\Exception $e) {
    echo "ไม่สามารถดึงข้อมูลได้: " .$e->getMessage();
  }
  $row=$query -> fetch(PDO::FETCH_OBJ);
  echo json_encode($row);
  $conn = "";
 ?>
