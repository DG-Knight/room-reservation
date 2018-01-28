<?php
require '../../../public/function.php';
$device_id = $_POST['device_id'];//echo $user_id;
$device_name = $_POST['device_name'];
$device_detail = $_POST['device_detail'];
$category = $_POST['category'];
$device_quantity = $_POST['device_quantity'];
echo "จำนวนอุปกรณ์ = ".$device_quantity."<br />";
$device_status = $_POST['device_status'];

$conn = PDOConnector();//ติดต่อฐานข้อมูล
//ตรวจสอบไฟลที่จะอัพโหลด์
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $device_image = $_FILES['device_image']['name'];
    $filePath = "../images/device-img/".$device_image;
    if (move_uploaded_file($_FILES["device_image"]["tmp_name"], $filePath)) {
        echo "Upload success";
        echo "ไฟล์ชือ = ".$device_image."<br/>";
    } else {
        echo "Upload failed";
        echo "ไฟล์ชือ = ".$device_image."<br/>";
    }
}
if ($device_id!='') {
  echo "UPDATE";
  //Update
  $query = $conn->prepare('UPDATE devices SET device_name = :device_name, device_detail = :device_detail, device_image = :device_image, device_quantity = :device_quantity, category = :category, device_status = :device_status WHERE device_id = :device_id');
  $result = $query->execute([
    'device_name' => $device_name,
    'device_detail' => $device_detail,
    'device_image' => $device_image,
    'device_quantity' => $device_quantity,
    'category' => $category,
    'device_status' => $device_status,
    'device_id' => $device_id
  ]);
}else {
  echo "INSERT";
  $query = $conn->prepare('INSERT INTO devices(device_name, device_detail, device_image, device_quantity, category, device_status) VALUES(:device_name, :device_detail, :device_image, :device_quantity, :category, :device_status)');
  $result = $query->execute(array(
      'device_name' => $device_name,
      'device_detail' => $device_detail,
      'device_image' => $device_image,
      'device_quantity' => $device_quantity,
      'category' => $category,
      'device_status' => $device_status
      ));
}
if ($result) {
  echo "success";
}else {
  echo "error";
}
$conn = "";
 ?>
