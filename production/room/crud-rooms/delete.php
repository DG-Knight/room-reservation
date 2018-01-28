<?php
$id = $_POST['room_id'];
echo "ID= ".$id;
include '../../../public/function.php';
$conn = PDOConnector();//ติดต่อฐานข้อมูล
$sql = "SELECT * FROM rooms WHERE room_id=$id"; //คำสั่ง sql เก็บไว้ในตัวแปร $sql
$query = $conn->prepare($sql);//นำคำสั่ง sql ที่เก็บไว้ในตัวแปร $sql มาเข้าฟังก์ชัน prepare() เพื่อเตรียมคำสั่งตรวจเช็กความถูกต้องก่อนจะสั่งให้ทำงาน
$query ->execute();//สั่งให้คำสั่ง sql ทำงาน
if ($query->rowCount()>0) {//ถ้าข้อมูลใน $query>0
  $data = $query -> fetch(PDO::FETCH_OBJ);//ให้วนรอบดึงข้อมูลออกมาจาก $query เก็บไว้ใน $data
    $image = $data->room_image;//ให้ $data ชี้ไปที่ คอลัม room_image ในตาราง rooms เพื่อนำชื่อรูปภาพไปเก็บไว้ใน $image
    //echo "ไฟล์ที่จะลบคือ : ".$image."<br />";
    if ($image) {//ถ้า $image มีชื่อรูปภาพจริง
      $result = DeleteRoom($id);//ลบข้อมูลห้องที่มี id = $id ด้วยฟังก์ชัน DeleteRoom()
      $success = unlink('../images/room-img/'.$image);//ลบรูปภาพที่ชื่อ = $image
      if ($success) {//ถ้าลบรูปภาพสำเร็จจริง
        echo "ลบ ".$image." สำเร็จแล้ว";//ให้แสดงชื่อรูปที่ลบ
      }else {
        echo "ไม่มีรูปภาพที่ชื่อ ".$image."ใน../images/room-img";
      }
    }else {//แต่ถ้าไม่ม่ข้อมูล
      echo "ไม่มีไฟล์ที่จะลบ";
      $result = DeleteRoom($id);//ลบข้อมูลห้องที่มี id = $id ด้วยฟังก์ชัน DeleteRoom() ได้เลย
    }
  }
$conn = "";//ปิดฐานข้อมูล
?>
