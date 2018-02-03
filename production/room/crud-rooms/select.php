<?php
$id = $_POST['room_id'];
include '../../../public/function.php';
$opt = '';
try {
  $conn = PDOConnector();
  $sql = "SELECT * FROM rooms  INNER JOIN room_category ON rooms.category=room_category.room_category_id WHERE room_id=$id";
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
  //check file
  if ($row->room_image) {
    $fileName = 'images/device-img/'.$row->room_image;
    //echo $fileName;
    if( file_exists($fileName) ){
      //echo "มีไฟล์";
      $image = '<img src="'.$fileName.'" style="width:100px">';
    }else{
      //echo "ไม่มีไฟล์";
      $fileName =  "images/noimage.jpg";
      $image = '<img src="'.$fileName.'" style="width:100px">';
    }
  }else {
      $fileName =  "images/noimage.jpg";
      $image = '<img src="'.$fileName.'" style="width:100px">';
  }
  // display data
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
              <td>'.$row->room_detail.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>ประเภทห้อง</b></lable></td>
              <td>'.$row->room_category_name.'</td>
             <tr>';
      $opt.='<tr>
              <td><lable><b>สถานะ</b></lable></td>
              <td>'.$status.'</td>
            <tr>';
      $opt.='<tr>
              <td><lable><b>รูปภาพ</b></lable></td>
              <td><center>'.$image.'</center></td>
            <tr>';
}
    $opt.='</table></div>';
echo $opt;
$conn ="";
 ?>
