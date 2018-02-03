<?php
include '../public/function.php';
$sql = " ";
$command = " ";
CheckAuthenticationAndAuthorization();
  $conn = PDOConnector();
  if (isset($_POST['SearchRooms'])) {

    $command = "SearchEmptyRooms";
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $startTime = $_POST['StartTime'];
    $endTime = $_POST['EndTime'];

    $sql  = 'SELECT * FROM rooms WHERE room_id AND room_status=1 NOT IN(SELECT room_id FROM booking WHERE (DAY(booking_start_date) BETWEEN "'.$startDate.'" AND "'.$endDate.'" ) OR (DAY(booking_end_date) BETWEEN "'.$startDate.'" AND "'.$endDate.'") OR (TIME(booking_start_time) BETWEEN "'.$startTime.'" AND "'.$endTime.'") OR (TIME(booking_end_time) BETWEEN "'.$startTime.'" AND "'.$endTime.'"))';
    //$sql  = 'SELECT * FROM rooms WHERE room_id NOT IN(SELECT room_id FROM booking WHERE (DAY(booking_start_date) BETWEEN "'.$startDate.'" AND "'.$endDate.'" ) OR (DAY(booking_end_date) BETWEEN "'.$startDate.'" AND "'.$endDate.'"))';
    $query = $conn->prepare($sql);
    $query ->execute();

  }
  if (isset($_POST['InsertBooking'])) {
    $bk_userID = $_POST['User_ID'];
    $bk_userName = $_POST['UserName'];
    $bk_roomID = $_POST['RoomID'];
    $bk_startDate = $_POST['StartDate'];
    $bk_endDate = $_POST['EndDate'];
    $bk_startTime = $_POST['StartTime'];
    $bk_endTime = $_POST['EndTime'];
    $bk_people = $_POST['People'];
    $bk_phone = $_POST['Phone'];
    $bk_subject = $_POST['Subject'];
    $bk_status = $_POST['Status'];

    $query = $conn->prepare('INSERT INTO booking(user_id, room_id, booking_start_date, booking_end_date, booking_start_time, booking_end_time, booking_subject, booking_user_name, booking_people, booking_phone, booking_status) VALUES(:bk_userID, :bk_roomID, :bk_startDate, :bk_endDate, :bk_startTime, :bk_endTime, :bk_subject, :bk_userName, :bk_people, :bk_phone, :bk_status)');
    $result = $query->execute(array(
      'bk_userID' => $bk_userID,
      'bk_roomID' => $bk_roomID,
      'bk_startDate' => $bk_startDate,
      'bk_endDate' => $bk_endDate,
      'bk_startTime' => $bk_startTime,
      'bk_endTime' => $bk_endTime,
      'bk_subject' => $bk_subject,
      'bk_userName' => $bk_userName,
      'bk_people' => $bk_people,
      'bk_phone' => $bk_phone,
      'bk_status' => $bk_status
        ));
      if ($result) {
        echo "<script>alert('บันทึกการจองสำเร็จ')
              window.location ='ask-booking.php';
              </script>";
      }
  }
  //$sql  = 'SELECT * FROM rooms a LEFT JOIN booking b ON a.room_id=b.room_id WHERE b.booking_start_date = curdate()';
 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <!-- Meta, title, CSS, favicons, etc. -->
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title> R-Reservation | Booking </title>

     <!-- Bootstrap -->
     <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Font Awesome -->
     <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
     <!-- NProgress -->
     <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
     <!-- iCheck -->
     <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
     <!-- bootstrap-daterangepicker -->
     <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
     <!-- jQuery custom content scroller -->
     <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

     <!-- Custom Theme Style -->
     <link href="../build/css/custom.min.css" rel="stylesheet">
   </head>

   <body class="nav-md">
     <div class="container body">
       <div class="main_container">
         <?php include "layout/menu.php";?><!-- top navigation -->
         <?php include "layout/header.php";?><!-- /top navigation -->
         <!-- page content -->
         <div class="right_col" role="main">
           <div class="">
             <div class="page-title">
               <div class="title_left">
                 <h3>จองห้อง</h3>
               </div>
             </div>
             <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-3 col-sm-3 col-xs-12">
               <?php include 'booking/view/search-box.php' ?>
               </div><!--/col search room-->
               <div class="col-md-9 col-sm-9 col-xs-12"><!--col show allow room-->
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>เลือกห้องที่ต้องการจองใช้งาน</h2>
                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                    <table class="table table-hover projects">
                        <thead>
                          <tr>
                            <th style="width: 1%">#</th>
                            <th>ภาพ</th>
                            <th style="width: 20%">ชื่อห้อง</th>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th style="width: 20%"><center>#</center></th>
                          </tr>
                       </thead>
                      <tbody>
                      <?php if ($command == "SearchEmptyRooms") {
                            include 'booking/view/view-empty-rooms.php';
                      }?>
                       </tbody>
                     </table>
                     </div>
                    </div>
                   </div>
                 </div>
               </div>

             </div>
           </div>
         </div>
         <!-- /page content -->
         <?php include 'booking/view/insert-form.php'; ?>
         <!-- footer content -->
         <?php include 'layout/footer.php'?>
         <!-- /footer content -->
       </div>
     </div>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
 <!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- jQuery custom content scroller -->
<script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<script src="../vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script>
$(document).ready(function(){
  //datepicker
  $("#StartDate").daterangepicker({
      singleDatePicker:!0,
      singleClasses:"picker_2",
      locale: {
        format: 'YYYY-MM-DD'
      }
  });
  //datepicker
  $("#EndDate").daterangepicker({
  singleDatePicker:!0,
      singleClasses:"picker_2",
      locale: {
        format: 'YYYY-MM-DD'
      }
  });
  $('#StartTime').datetimepicker({
      format: 'HH:mm'
  });
  $('#EndTime').datetimepicker({
      format: 'HH:mm'
  });
  $('.choose').click(function(){
      var bid=$(this).attr("id");//รับค่า id จากปุ่มวิวมาใส่ไว้ใน uid
      console.log(bid);
      $.ajax({
          url:"booking/crud-booking/fetch.php",
          method:"post", //ด้วย method post
          data:{room_id:bid},//ส่งข้อมูลไปในรูปแบบ JSON
          dataType:"json",
          success:function(data){ // หากส้งข้อมูลสำเร็จ
              console.log(data.room_name);
              $('#room_id').val(data.room_id);
              $('#room_name').val(data.room_name);
              $('#chooseModal').modal('show');//เรียก Modal มาแสดง
          }
      });
  });
});
</script>
</body>
 </html>
