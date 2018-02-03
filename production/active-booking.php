<?php
include '../public/function.php';
CheckAuthenticationAndAuthorization();
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
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="../vendors/sweetalert2/dist/sweetalert2.min.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include "layout/menu.php";?><!-- top navigation -->
        <?php include "layout/header.php";?><!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <?php require 'booking/crud-booking/active.php'; ?>
              <?php include 'booking/view/view-active.php'; ?>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <?php include 'booking/view/viewModal.php'?>
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
  </body>
  <script src="../vendors/sweetalert2/dist/sweetalert2.min.js"></script>
  <script>
//allow booking
$('.allow').click(function(){//ตรวจสอบคลาส
  var bid=$(this).attr("id");//รับค่า id จากปุ่ม
  console.log(bid);
  $.ajax({
    url:"booking/crud-booking/active-or-block.php",
    method:"post",
    data:{booking_id:bid,booking_status:1},
    success:function(data){
      //console.log(data);
      swal(
        'อนุมัติสำเร็จ!',
        'คุณได้อนุมัติห้องนี้แล้ว.',
        'success'
       ).then((result)=>{
        if (result.value) {
          location.reload();//โหลดหน้าเว็บใหม่อีกครั้ง
        }
      });
    }
  });
});
//block booking
$('.block').click(function(){//ตรวจสอบคลาส
  var bid=$(this).attr("id");//รับค่า id จากปุ่ม
  console.log(bid);
  $.ajax({
    url:"booking/crud-booking/active-or-block.php",
    method:"post",
    data:{booking_id:bid,booking_status:2},
    success:function(data){
      //console.log(data);
      swal(
        'ไม่อนุมัติสำเร็จ!',
        'คุณไม่อนุมัติห้องนี้สำเร็จแล้ว.',
        'success'
       ).then((result)=>{
        if (result.value) {
          location.reload();//โหลดหน้าเว็บใหม่อีกครั้ง
        }
      });
    }
  });
});
  //View
    $('.view_data').click(function(){//เมื่อมีการกดปุ่ม view_data
      var bid=$(this).attr("id");//รับค่า id จากปุ่มวิวมาใส่ไว้ใน uid
      $.ajax({
        url:"booking/crud-booking/select.php", //ส่งข้อมูลไปทีไฟล์ select.php
        method:"post", //ด้วย method post
        data:{booking_id:bid},//ส่งข้อมูลไปในรูปแบบ JSON
        success:function(data){ // หากส้งข้อมูลสำเร็จ
          $('#detail').html(data);//นำข้อมูลไปแสดงที่ Modal body ตรง id detail ในไฟล์ viewModal.php
          $('#dataModal').modal('show');//เรียก Modal มาแสดง
        }
      });
    });
  </script>
</html>
