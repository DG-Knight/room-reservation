<?php
$id = $_POST['room_id'];
include '../../public/function.php';
$opt = '';
try {
  $conn = PDOConnector();
  $sql = "SELECT * FROM rooms WHERE room_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
} catch (\Exception $e) {
  echo "ไม่สามารถดึงข้อมูลได้: " .$e->getMessage();
}

$opt.='<div class="table-responsive">
<table class="table table-bordered">';
while ($row=$query -> fetch(PDO::FETCH_OBJ)) {
  if ($row->room_status==0) {
    $status = "ปิดใช้งาน";
  }else{
    $status = "เปิดใช้งาน";
  }
      $opt.='<tr>
              <td><lable><b>ID</b></lable></td>
              <td>'.$row->room_id.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>ชื่อห้อง</b></lable></td>
              <td>'.$row->room_name.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>รายละเอียดห้อง</b></lable></td>
              <td>'.$row->room_detial.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>ประเภทห้อง</b></lable></td>
              <td>'.$row->room_category.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>สถานะ</b></lable></td>
              <td>'.$status.'</td>
            <tr>';
      $opt.='<tr>
              <td><lable><b>รูปภาพ</b></lable></td>
              <td>'.$row->room_image.'</td>
            <tr>';
}
    $opt.='</table></div>';
echo $opt;
$conn ="";
 ?>
