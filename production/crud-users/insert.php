<?php
require '../../public/function.php';
$user_id = $_POST['user_id'];//echo $user_id;
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_sex = $_POST['gender'];
$user_address = $_POST['user_address'];
$user_phone = $_POST['user_phone'];
$level_id = $_POST['level_id'];
$user_status = $_POST['user_status'];

$conn = PDOConnector();//ติดต่อฐานข้อมูล
if ($user_id!='') {
  echo "UPDATE";
  //ดึงข้อมูลวันเวลาที่สมัคร เนื่องจากตอนอัพเดต ยังคงใช้วันเวลาที่สมัครเดิม
  $sql = "SELECT * FROM users WHERE user_id=$user_id";
  $query = $conn->prepare($sql);
  $query ->execute();
  $row=$query -> fetch(PDO::FETCH_OBJ);
  $user_registered = $row->user_registered;
  //Update
  $query = $conn->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, user_sex = :user_sex, user_address = :user_address, user_phone = :user_phone, user_email = :user_email, user_password = :user_password, user_registered = :user_registered, level_id = :level_id, user_status = :user_status WHERE user_id = :user_id');
  $result = $query->execute([
    'first_name' => $first_name,
    'last_name' => $last_name,
    'user_sex' => $user_sex,
    'user_address' => $user_address,
    'user_phone' => $user_phone,
    'user_email' => $user_email,
    'user_password' => $user_password,
    'user_registered' => $user_registered,
    'level_id' => $level_id,
    'user_status' => $user_status,
    'user_id' => $user_id
  ]);
}else {
  echo "INSERT";
  $datetime = new DateTime();
  $user_registered = $datetime->format('Y-m-d H:i:s');//รับค่าข้อมูลวันเวลาปัจจุบันเพื่อใช้บันทึกวันเวลาที่สมาชิกสมัครใช้งานระบบ

  $query = $conn->prepare('INSERT INTO users(first_name, last_name, user_sex, user_address, user_phone, user_email, user_password, user_registered, level_id, user_status) VALUES(:first_name, :last_name, :user_sex, :user_address, :user_phone, :user_email, :user_password, :user_registered, :level_id, :user_status)');
  $result = $query->execute(array(
      'first_name' => $first_name,
      'last_name' => $last_name,
      'user_sex' => $user_sex,
      'user_address' => $user_address,
      'user_phone' => $user_phone,
      'user_email' => $user_email,
      'user_password' => $user_password,
      'user_registered' => $user_registered,
      'level_id' => $level_id,
      'user_status' => $user_status
      ));
}
if ($result) {
  echo "success";
}else {
  echo "error";
}
$conn = "";
 ?>
