<?php
require '../../../public/function.php';
$conn = PDOConnector();//ติดต่อฐานข้อมูล
$booking_id = $_POST['booking_id'];
$booking_status = $_POST['booking_status'];
//echo "ID =".$booking_id."AND Status = ".$booking_status;
$query = $conn->prepare('UPDATE booking SET booking_status = :booking_status WHERE booking_id = :booking_id');
$result = $query->execute([
  'booking_status' => $booking_status,
  'booking_id' => $booking_id
]);
$conn = " ";
 ?>
