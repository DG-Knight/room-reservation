<?php
$title = "รายการที่อนุมัติ";
$conn = PDOConnector();
$id = $_SESSION['AUTHEN']['UID'];
$sql = 'SELECT * FROM booking inner join rooms on booking.room_id=rooms.room_id WHERE user_id="'.$id.'" AND booking_status=1 ORDER BY booking_id DESC';
$query = $conn->prepare($sql);
$query->execute();
?>
