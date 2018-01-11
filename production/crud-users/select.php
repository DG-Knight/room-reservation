<?php
$id = $_POST['user_id'];
include '../../public/function.php';
$opt = '';
try {
  $conn = PDOConnector();
  $sql = "SELECT * FROM users WHERE user_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
} catch (\Exception $e) {
  echo "ไม่สามารถดึงข้อมูลได้: " .$e->getMessage();
}

$opt.='<div class="table-responsive">
<table class="table table-bordered">';
while ($row=$query -> fetch(PDO::FETCH_OBJ)) {
  //ตรวจสอบระดับของผู้ใช้งาน
  // 0 = ผู้ดูแลระบบ
  // 1 = สมาชิกทั่วไป
  if($row->level_id==0){ //ถ้า level_id ที่ได้มาจากฐานข้อมูลมีค่าเท่ากับ 0
      $level = "ผู้ดูแลระบบ"; //กำหนดให้ตัวแปล $level = ผู้ดูแลระบบ
  }else{//ถ้าไม่เท่ากับ 0
        $level = "สมาชิกทั่วไป";} //กำหนดให้ตัวแปล $level = สมาชิกทั่วไป
  //ตรวจสอบสถานะการใช้งานว่าอนุญาตให้ผู้ใช้คนนี้ใช้งานระบอยู่หรือไม่ ?
  if ($row->user_status==0) {
    $status = "ปิดกั้น";
  }else {
    $status = "เปิดใช้";
  }
      $opt.='<tr>
              <td><lable><b>ID</b></lable></td>
              <td>'.$row->user_id.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>ระดับสมาชิก</b></lable></td>
              <td>'.$level.'</td>
             </tr>';
      $opt.='<tr>
              <td><lable><b>ชื่อ</b></lable></td>
              <td>'.$row->first_name.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>นามสกุล</b></lable></td>
              <td>'.$row->last_name.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>เพศ</b></lable></td>
              <td>'.$row->user_sex.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>วันที่ลงทะเบียน</b></lable></td>
              <td>'.$row->user_registered.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>Email</b></lable></td>
              <td>'.$row->user_email.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>เบอร์โทรศัพท์</b></lable></td>
              <td>'.$row->user_phone.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>ที่อยู่</b></lable></td>
              <td>'.$row->user_address.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>สถานะ</b></lable></td>
              <td>'.$status.'</td>
             <tr>';
}
    $opt.='</table></div>';
echo $opt;
$conn = "";
 ?>
