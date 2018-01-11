<?php
# $result = 1 คือ password หรือ Username ไม่ถูกต้อง
include 'public/function.php';
$result = '';
if (isset($_POST['submit'])) {
  $result = Authentication($_POST['username'],$_POST['password']);
  if($result){
    header('location: production/index.php');
    die();
  }else{
    $result = 1; //echo $result;
  }
}
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
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome ไอคอนสวยๆ-->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress Progressbar สีเขียวตอนโหลดหน้า-->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
  <!-- iCheck  เปลี่ยนcheckboxธรรมดาให้สวยๆมีสีสัน-->
  <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">
    <!-- Sweetalert2 -->
  <link href="vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <?php if ($result == 1) {?>
    <!-- popover -->
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <center><strong>แจ้งแตือน!</strong> Username หรือ Password ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง .</center>
    </div>
    <?php } ?>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post">
            <h1>Login</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required="" />
            </div>
            <div>
              <button type="submit" name="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
              <h3>
                <a class="" href="#">คุณลืมรหัสผ่านใช่ไหม?</a>
              </h3>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">ฉันยังไม่เป็นสมาชิก?
                <a href="public/register.php" class="to_register"> สร้างบัญชีใหม่ </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1>
                  <i class="fa fa-calendar"></i> R-RESERVATION</h1>
                <p>©2017 All Rights Reserved. R-Reservation</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div><!--login_wrapper -->
  </div>
  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick จะมาช่วยทำให้เว็บของเรานั้นเร็วปรื๊ดปร๊าด-->
  <script src="vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress Progressbar สีเขียวตอนโหลดหน้า -->
  <script src="vendors/nprogress/nprogress.js"></script>
  <!-- iCheck เปลี่ยนcheckboxธรรมดาให้สวยๆมีสีสัน-->
  <script src="vendors/iCheck/icheck.min.js"></script>
  <!-- Parsley ใช้ validate ข้อมูลที่อยู่ในฟอร์มว่าช่องไหนบ้างที่จำเป็นต้องกรอกแต่ไม่มีข้อมูล พร้อมแสดงขอบสีแดงในช่องที่ไม่มีข้อมูล-->
  <!-- <script src="vendors/parsleyjs/dist/parsley.min.js"></script> -->
  <!-- jquery.inputmask ใส่ขีดและเว้นวรรคเบอร์โทรให้อัตโนมัติ-->
  <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>
</body>
</html>
