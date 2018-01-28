<?php
$id = $_POST['device_id'];
include '../../../public/function.php';
$opt = '';
try {
  $conn = PDOConnector();
  $sql = "SELECT * FROM devices INNER JOIN device_category ON devices.category=device_category.device_category_id WHERE device_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();
} catch (\Exception $e){
  echo "ไม่สามารถดึงข้อมูลได้: " .$e->getMessage();
}

$opt.='<div class="table-responsive">
<table class="table table-bordered">';
while ($row=$query -> fetch(PDO::FETCH_OBJ)) {
  //ตรวจสอบสถานะอุปกรณ์
  if($row->device_status==0){
    $status = "ปิดใช้งาน";
  }else {
    $status = "เปิดใช้งาน";
  }
      $opt.='<tr>
              <td><lable><b>ID</b></lable></td>
              <td>'.$row->device_id.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>ชื่ออุปกรณ์</b></lable></td>
              <td>'.$row->device_name.'</td>
             </tr>';
      $opt.='<tr>
              <td><lable><b>รายละเอียด</b></lable></td>
              <td>'.$row->device_detail.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>ประเภท</b></lable></td>
              <td>'.$row->device_category_name.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>จำนวนที่มี</b></lable></td>
              <td>'.$row->device_quantity.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>สถานะ</b></lable></td>
              <td>'.$status.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>สถานะ</b></lable></td>
              <td><center><img width="300" src="images/device-img/'.$row->device_image.'"></center></td>
             <tr>';
}
    $opt.='</table></div>';
echo $opt;
$conn = '';?>
