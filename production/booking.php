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

     <!-- Custom Theme Style -->
     <link href="../build/css/custom.min.css" rel="stylesheet">
   </head>

   <body class="nav-md">
     <div class="container body">
       <div class="main_container">
         <?php include_once 'menu.php'?><!-- top navigation -->
         <?php include_once 'header.php'?><!-- /top navigation -->
         <!-- page content -->
         <div class="right_col" role="main">
           <div class="">
             <div class="page-title">
               <div class="title_left">
                 <h3>จองห้อง</h3>
               </div>

               <!-- <div class="title_right">
                 <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                   <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search for...">
                     <span class="input-group-btn">
                       <button class="btn btn-default" type="button">Go!</button>
                     </span>
                   </div>
                 </div>
               </div> -->
             </div>

             <div class="clearfix"></div>

             <div class="row">
               <div class="col-md-3 col-sm-3 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>วัน/เวลาทีต้องการจอง</h2>
                     <!-- <ul class="nav navbar-right panel_toolbox"> -->
                     <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                       </li> -->
                      <!-- <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                           <li><a href="#">Settings 1</a>
                           </li>
                           <li><a href="#">Settings 2</a>
                           </li>
                         </ul>
                       </li>
                       <li><a class="close-link"><i class="fa fa-close"></i></a>
                       </li>-->
                     <!-- </ul> -->
                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">
                    <!-- DateTimePicker StartDate -->
                    <div class="row">
                      <div class="form-group">
                      <lable><strong>วันที่เริ่ม</strong></label>
                          <div class="has-feedback">
                            <input  id="StartDate" name="StartDate" type="text" class="form-control has-feedback-left" title="StartDate" style="padding-left:55px;" placeholder="" aria-describedby="inputSuccess2Status3" >
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                        <label><strong>เวลาที่เริ่ม</strong></label>
                        <table class="table table-condensed table-no-bordered no-margin">
                            <tbody><tr>
                                <td class="no-padding">
                                    <select class="form-control" id="timeStartH" name="timeStart">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                      </select>
                                </td>
                                <td class="no-padding">
                                    <select class="form-control ddlTime" id="timeStartM" name="timeStartM">
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody></table>
                    </div>
                  </div>
                    <!-- DateTimePicker StopDate -->
                    <div class="row">
                          <div class="form-group">
                            <lable><strong>วันที่สิ้นสุด</strong></label>
                              <div class="has-feedback">
                                 <input  id="StopDate" name="StopDate" type="text" class="form-control has-feedback-left" title="StopDate" style="padding-left:55px;" placeholder="" aria-describedby="inputSuccess2Status3">
                                 <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                          </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                        <label><strong>เวลาที่สิ้นสุด</strong></label>
                        <table class="table table-condensed table-no-bordered table-responsive no-margin">
                            <tbody><tr>
                                <td class="no-padding">
                                    <select class="form-control" id="timeStartH" name="timeStart">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                      </select>
                                </td>
                                <td class="no-padding">
                                    <select class="form-control ddlTime" id="timeStartM" name="timeStartM">
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody></table>
                    </div>
                  </div>
                  <div class="row">
                    <center><button type="button" class="btn btn-round btn-primary"><i class="fa fa-search"></i> ค้นหาห้องว่าง</button></center>
                  </div>
                  </div><!--/x_content-->
                  </div>
                </div><!--/col search room-->

               <div class="col-md-9 col-sm-9 col-xs-12"><!--col show allow room-->
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>เลือกห้องที่ต้องการจองใช้งาน</h2>
                     <!-- <ul class="nav navbar-right panel_toolbox">
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                       </li>
                       <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                           <li><a href="#">Settings 1</a>
                           </li>
                           <li><a href="#">Settings 2</a>
                           </li>
                         </ul>
                       </li>
                       <li><a class="close-link"><i class="fa fa-close"></i></a>
                       </li>
                     </ul> -->
                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">

                     <p>กรุณาเลือกห้องที่ท่านต้องการจองด้วยค่ะ !</p>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
<!-- <style>
.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
 background-color: #73f2fc;
}
</style> -->
                     <!-- start project list -->
                     <div class="table-responsive">
                     <table class="table table-hover projects">
                       <thead>
                         <tr>
                           <th style="width: 1%">#</th>
                           <th>ภาพ</th>
                           <th style="width: 20%">ชื่อห้อง</th>
                           <th>Project Progress</th>
                           <th>สถานะ</th>
                           <th style="width: 20%"><center>#</center></th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>#</td>
                           <td>
                             <a class="image view view-first">
                               <img class="" src="images/picture.jpg" style="width:100px" alt="...">
                             </a>

                           </td>
                           <td>
                             <a>Pesamakini Backend UI</a>
                             <br />
                             <small>Created 01.01.2015</small>
                           </td>

                           <td class="project_progress">
                             <div class="progress progress_sm">
                               <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                             </div>
                             <small>57% Complete</small>
                           </td>
                           <td>
                             <input type="button" class="btn btn-success" value="ว่าง" />
                           </td>
                           <td>
                             <center><a href="#" id="choose" class="btn btn-primary"><i class="fa fa-check"></i> จอง </a><center>
                           </td>
                         </tr>

                         <tr>
                           <td>#</td>
                           <td>
                             <a class="image view view-first">
                               <img class="" src="images/picture.jpg" style="width:100px" alt="...">
                             </a>

                           </td>
                           <td>
                             <a>Pesamakini Backend UI</a>
                             <br />
                             <small>Created 01.01.2015</small>
                           </td>

                           <td class="project_progress">
                             <div class="progress progress_sm">
                               <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                             </div>
                             <small>57% Complete</small>
                           </td>
                           <td>
                             <input type="button" class="btn btn-success" value="ว่าง" />
                           </td>
                           <td>
                             <center><a href="#" id="choose" class="btn btn-primary"><i class="fa fa-check"></i> จอง </a><center>
                           </td>
                         </tr>
                         <tr>
                           <td>#</td>
                           <td>
                             <a class="image view view-first">
                               <img class="" src="images/picture.jpg" style="width:100px" alt="...">
                             </a>

                           </td>
                           <td>
                             <a>Pesamakini Backend UI</a>
                             <br />
                             <small>Created 01.01.2015</small>
                           </td>

                           <td class="project_progress">
                             <div class="progress progress_sm">
                               <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                             </div>
                             <small>57% Complete</small>
                           </td>
                           <td>
                             <input type="button" class="btn btn-success" value="ว่าง" />
                           </td>
                           <td>
                             <center><a href="#" id="choose" class="btn btn-primary"><i class="fa fa-check"></i> จอง </a><center>
                           </td>
                         </tr>

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
         <?php include_once 'footer.php'?>
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

     <!-- Custom Theme Scripts -->
     <script src="../build/js/custom.min.js"></script>
     <script>
     $(document).ready(function(){
       $("#StartDate").daterangepicker({
		       singleDatePicker:!0,
		         singleClasses:"picker_2",
		         locale: {
                 format: 'YYYY-MM-DD'
             }
             });
           });

     </script>
   </body>
 </html>
