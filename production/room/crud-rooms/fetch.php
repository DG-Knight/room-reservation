<?php
$id = $_POST['room_id'];
include '../../../public/function.php';
  try {
    $conn = PDOConnector();
    $sql = "SELECT * FROM rooms WHERE room_id=$id";
    $query = $conn->prepare($sql);
    $query ->execute();
  } catch (\Exception $e) {
    echo "ไม่สามารถดึงข้อมูลได้: " .$e->getMessage();
  }
  $row=$query -> fetch(PDO::FETCH_OBJ);
  echo json_encode($row);
  $conn = "";
 ?>
