<?php
  require '../public/function.php';
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

    <title>R-Reservation | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md footer_fixed" >
    <div class="container body">
      <div class="main_container">
        <?php include_once 'menu.php'?>
        <?php include_once 'header.php'?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <br/>
              <div class="row">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>กรุณาเลือกทำรายการ</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> -->
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li> -->
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2></h2>
                              <h1>จองห้อง</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> 2 years access <strong> to all storage locations</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                    <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                    <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="index.php?file=booking" class="btn btn-success btn-block" role="button">จอง <span> now !</span></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2></h2>
                              <h1>ยืมอุปกรณ์</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> 2 years access <strong> to all storage locations</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                    <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                    <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="index.php?file=borrow" class="btn btn-success btn-block" role="button">ยืม <span> now !</span></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                      </div>
                    </div>
                  </div>
                </div>

                <?php // ทำเว็บหน้าเดี่ยว
                  // if(isset($_GET['file'])){
                  //   $app_file = $_GET['file'].'.php';
                  //     if(is_file($app_file)){
                  //       include_once($app_file);
                  //     }else{
                  //       include_once('page_404.php');
                  //       //echo 'Page Not Found 404';
                  //     }
                  // }else{
                  //   include_once('main.php');
                  // }
                ?>

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php include_once 'footer.php' ?>
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
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
  <script>
    $(document).ready(function(){
      //delete
      $('.delete_data').click(function(){//ตรวจสอบคลาส delete_data เมื่อมีการกดปุ่ม
        var uid=$(this).attr("id");//รับค่า id จากปุ่มdeleteมาใส่ไว้ใน uid
        //var status=confirm("Are you want delete ?");
        swal({title: 'Are you sure?',
              text: "You want be delete this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                  if (result.value) {//เช็กค่าว่าเป็น T|F
                      console.log(result.value);//ปริ้นค้าออกทาง console log
                      $.ajax({  url:"crud-room/delete.php", //ส่งข้อมูลไปทีไฟล์ delete.php
                                method:"post", //ด้วย method post
                                data:{id:uid},//ส่งข้อมูลไปในรูปแบบ JSON
                                success:function(data){ // หากส่งข้อมูลสำเร็จ
                                  console.log(data);
                                  swal(
                                    'Deleted!',
                                    'Your user has been deleted.',
                                    'success'
                                  ).then((result)=>{
                                    if (result.value) {
                                      location.reload();//โหลดหน้าเว็บใหม่อีกครั้ง
                                    }
                                  });
                                }
                              });
                  }
                });
      });
    })
    $('#insertRoom').modal('show');
  </script>
</html>
