<?php
include '../public/function.php';
$sql = " ";
$command = "";
//$today =  date("Y-m-D");
CheckAuthenticationAndAuthorization();
  $conn = PDOConnector();
  if (isset($_POST['search-rooms'])) {

    $command = "SearchEmptyRooms";
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $startTime = $_POST['StartTime'];
    $endTime = $_POST['EndTime'];
    //echo "StartTime = ".$startTime."<br>EndTime = ".$endTime;
    $sql  = 'SELECT * FROM rooms WHERE room_id NOT IN(SELECT room_id FROM booking WHERE ((DAY(booking_start_date) BETWEEN "'.$startDate.'" AND "'.$endDate.'" ) OR (DAY(booking_end_date) BETWEEN "'.$startDate.'" AND "'.$endDate.'")) AND ((TIME(booking_start_time) BETWEEN "'.$startTime.'" AND "'.$endTime.'") OR (TIME(booking_end_time) BETWEEN "'.$startTime.'" AND "'.$endTime.'")))';
    $query = $conn->prepare($sql);
    $query ->execute();
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
               <?php include 'booking/search/search-box.php' ?>
               </div><!--/col search room-->
               <div class="col-md-9 col-sm-9 col-xs-12"><!--col show allow room-->
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>เลือกห้องที่ต้องการจองใช้งาน</h2>
                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">

                     <!-- <p>กรุณาเลือกห้องที่ท่านต้องการจองด้วยค่ะ !</p>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                      </div> -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                     <!-- start project list -->
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
                                include 'booking/crud-booking/show-empty-rooms.php';
                              }
                         ?>
                       </tbody>
                     </table>
                     </div>
                    </div>
                     <!-- end project list -->

                   </div>
                 </div>
               </div>

             </div>
           </div>
         </div>
         <!-- /page content -->
         <?php include 'booking/crud-Booking/insertModal.php'; ?>
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
     <!-- Custom Theme Scripts -->
     <script src="../build/js/custom.min.js"></script>
     <script>
     $(document).ready(function(){
       $("#StartDate").daterangepicker({
		       singleDatePicker:!0,
		         singleClasses:"picker_2",
		         locale: {
                 format: 'DD-MM-YYYY'
             }
        });
        $("#EndDate").daterangepicker({
 		       singleDatePicker:!0,
 		         singleClasses:"picker_2",
 		         locale: {
                  format: 'DD-MM-YYYY'
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
             url:"booking/crud-booking/fetch.php", //ส่งข้อมูลไปทีไฟล์ select.php
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
