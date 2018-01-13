<?php
require '../../public/function.php';
$conn = PDOConnector();//ติดต่อฐานข้อมูล
$room_status = "";
$room_id = isset($_POST['room_id']);//echo $room_id;
$room_name = $_POST['room_name'];
$room_detial = $_POST['room_detial'];
$room_category = $_POST['room_category'];
if ($_POST['room_status']) {
  $room_status = 1;
  echo "room status = ".$room_status;
}else {
  $room_status = 0;
  echo "room status = ".$room_status;
}
//ตรวจสอบไฟลที่จะอัพโหลด์
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_image = $_FILES['room_image']['name'];
    $filePath = "../images/room-img/".$room_image;
    if (move_uploaded_file($_FILES["room_image"]["tmp_name"], $filePath)) {
        echo "Upload success";
        echo "ไฟล์ชือ = ".$room_image;
    } else {
        echo "Upload failed";
        echo "ไฟล์ชือ = ".$room_image;
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
