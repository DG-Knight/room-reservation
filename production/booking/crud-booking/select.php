<?php
$opt = '';
$id = $_POST['booking_id'];
include '../../../public/function.php';

  $conn = PDOConnector();
  $sql = "SELECT * FROM booking INNER JOIN rooms ON booking.room_id=rooms.room_id WHERE booking_id=$id";
  $query = $conn->prepare($sql);
  $query ->execute();

$opt.='<div class="table-responsive">
<table class="table table-bordered table-hover">';
while ($row=$query -> fetch(PDO::FETCH_OBJ)) {
  //ตรวจสอบสถานะอุปกรณ์
  if($row->booking_status==0){
    $status = "รออนุมัติ";
  }
      $opt.='<tr>
                <th><lable>ID</lable></th>
                <td>'.$row->booking_id.'</td>
            </tr>';
      $opt.='<tr>
                <th><lable><b>ชื่อห้อง</b></lable></th>
                <td>'.$row->room_name.'</td>
             </tr>';
      $opt.='<tr>
                <th><lable><b>ชื่อผู้ขอใช้ห้อง</b></lable></th>
                <td>'.$row->booking_user_name.'</td>
             </tr>';
      $opt.='<tr>
                <th><lable><b>รายละเอียด</b></lable></th>
                <td>'.$row->booking_subject.'</td>
            </tr>';
      $opt.='<tr>
                <th><lable><b>วันที่จอง</b></lable></th>
                <td>'.$row->booking_start_date.'</td>
             <tr>';
      $opt.='<tr>
                <th><lable><b>เวลาที่จอง</b></lable></th>
                <td>'.$row->booking_start_time.'</td>
              </tr>';
      $opt.='<tr>
                <th><lable><b>วันที่คืนห้อง</b></lable></th>
                <td>'.$row->booking_end_date.'</td>
             <tr>';
      $opt.='<tr>
                <th><lable><b>เวลาที่คืนห้อง</b></lable></th>
                <td>'.$row->booking_end_time.'</td>
            </tr>';
      $opt.='<tr>
              <td><lable><b>เบอร์ติดต่อ</b></lable></td>
              <td>'.$row->booking_phone.'</td>
             <tr>';
}
    $opt.='</table></div>';
echo $opt;
$conn = '';?>
