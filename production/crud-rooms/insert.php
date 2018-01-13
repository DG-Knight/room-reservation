<?php
require '../../public/function.php';

$room_id = $_POST['room_id'];//echo $room_id;
$room_name = $_POST['room_name'];
$room_detial = $_POST['room_detial'];
$room_category = $_POST['room_category'];
$room_status = $_POST['room_status'];
$room_status = 1;
$conn = PDOConnector();//ติดต่อฐานข้อมูล
//ตรวจสอบไฟลที่จะอัพโหลด์
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_image = $_FILES['room_image']['name'];
    //$fileExt = pathinfo($_FILES["inputFile"]["name"], PATHINFO_EXTENSION);
    $filePath = "../images/room-img/".$room_image;
    if (move_uploaded_file($_FILES["room_image"]["tmp_name"], $filePath)) {
        echo "Upload success";
    } else {
        echo "Upload failed";
    }
}

if ($room_id!='') {
  echo "UPDATE";
  //Update
  $query = $conn->prepare('UPDATE rooms SET room_name = :room_name, room_detial = :room_detial, room_image = :room_image, room_category = :room_category, room_status = :room_status WHERE room_id = :room_id');
  $result = $query->execute([
    'room_name' => $room_name,
    'room_detial' => $room_detial,
    'room_image' => $room_image,
    'room_category' => $room_category,
    'room_status' => $room_status,
    'room_id' => $room_id
  ]);
}else {
  echo "INSERT";
  $query = $conn->prepare('INSERT INTO rooms(room_name, room_detial, room_image, room_category, room_status) VALUES(:room_name, :room_detial, :room_image, :room_category, :room_status)');
  $result = $query->execute(array(
    'room_name' => $room_name,
    'room_detial' => $room_detial,
    'room_image' => $room_image,
    'room_category' => $room_category,
    'room_status' => $room_status
      ));
}
if ($result) {
  echo "success";
}else {
  echo "error";
}
$conn = "";
 ?>
