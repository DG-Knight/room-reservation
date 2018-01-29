<?php
include '../public/function.php';
CheckAuthenticationAndAuthorization();
require 'booking/crud-booking/insert.php';
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
              <div class="col-md-12 col-sm-12 col-xs-12"><!--col show allow room-->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>สถานะการจอง</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                     <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- start project list -->
                    <div class="table-responsive">
                      <table class="table table-hover projects">
                        <thead>
                          <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 10%">ภาพ</th>
                            <th style="width: 20%">ชื่อห้อง</th>
                            <th>รายละเอียด</th>
                            <th>วัน/เวลาที่จอง</th>
                            <th>วัน/เวลาที่คืนห้อง</th>
                            <th style="width: 5%"><center>สถานะ</center></th>
                            <th style="width: 5%"><center>#</center></th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                           if ($query->rowCount()>0) {
                             $i = 1;
                             while ($data = $query -> fetch(PDO::FETCH_OBJ)) {
                        ?>
                          <tr>
                            <td><?=$i++ ?></td>
                                <td>
                                  <a class="image view view-first">
                                    <?php
                                    if ($data->room_image) {
                                      $fileName = 'images/room-img/'.$data->room_image;
                                      //echo $fileName;
                                      if( file_exists($fileName) ){
                                        //echo "มีไฟล์";
                                        echo '<img src="'.$fileName.'" style="width:100px">';
                                      }else{
                                        //echo "ไม่มีไฟล์";
                                        $fileName =  "images/noimage.jpg";
                                        echo '<img src="'.$fileName.'" style="width:100px">';
                                      }
                                    }else {
                                      $fileName =  "images/noimage.jpg";
                                      echo '<img src="'.$fileName.'" style="width:100px">';
                                    }
                                ?>
                              </a>
                            </td>

                            <td>
                              <a><?=$data->room_name;?></a>
                              <br />
                              <small> <?php //echo "วันที่"."<br>".$data->booking_start_date." - ".$data->booking_stop_date."<br>เวลา ".$data->booking_start_time." - ".$data->booking_stop_time;?></small>
                            </td>

                            <td>
                              <?=$data->booking_subject;?>
                            </td>
                            <td>วันที่ : <?=$data->booking_start_date;?><br />เวลา : <?=$data->booking_start_time;?></td>
                            <td>วันที่ : <?=$data->booking_end_date;?><br />เวลา : <?=$data->booking_end_time;?></td>

                            <td><center>
                              <?php
                              if ($data->booking_status==0) {
                                  $status = "รออนุมัติ";
                                  echo '<button class="btn btn-warning btn-round" style="width:100%">'.$status.'</button>';
                                }elseif ($data->booking_status==1) {
                                  $status = "อนุมัติ";
                                  echo '<button class="btn btn-success btn-round" style="width:100%">'.$status.'</button>';
                                }elseif($data->booking_status==2){
                                  $status = "ไม่อนุมัติ";
                                  echo '<button class="btn btn-danger btn-round" style="width:100%">'.$status.'</button>';
                                }?></center>
                            </td>

                            <td>
                              <center><a href="#" id="<?=$data->booking_id?>" class="btn btn-danger cancle"><i class="fa fa-trash"></i> ยกเลิก </a><center>
                            </td>

                          </tr>
                        <?php }}//EndRowCount&&WhileLoop ?>

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
    <script src="../vendors/sweetalert2/dist/sweetalert2.min.js"></script>
  </body>
</html>
