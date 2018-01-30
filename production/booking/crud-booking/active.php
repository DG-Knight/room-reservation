<?php
$conn = PDOConnector();
$sql = 'SELECT * FROM booking inner join rooms on booking.room_id=rooms.room_id WHERE booking_status=0 ORDER BY booking_id DESC';
$query = $conn->prepare($sql);
$query->execute();
?>
