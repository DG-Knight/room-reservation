<?php
include('function.php');

 $result = '';
 $alert_types = '';
 $no_match_password = '';

if (isset($_POST['submit'])) {

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $user_sex = $_POST['gender'];
  $user_address = $_POST['user_address'];
  $user_phone = $_POST['user_phone'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $user_password2 = $_POST['user_password2'];

  if ($user_password == $user_password2) {
    $password = md5($user_password);
    $result = Register($first_name,$last_name,$user_sex,$user_address,$user_phone,$user_email,$password);
    if($result){
      echo "<script>alert('คุณได้สมัครสมาชิกเรียบรอยแล้ว กรุณาเข้าสุ่ระบบ');window.location = '../index.php';</script>";
    }
  }else {
      //echo "passwordไม่ตรงกัน";
      $no_match_password = 1;
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
  <title>Room Reservation | </title>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome ไอคอนสวยๆ-->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress Progressbar สีเขียวตอนโหลดหน้า-->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
  <!-- iCheck  เปลี่ยนcheckboxธรรมดาให้สวยๆมีสีสัน-->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
  <!-- popover -->
  <?php if ($no_match_password == 1) {?>
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <center><strong>แจ้งแตือน!</strong> Password ไม่ตรงกัน กรุณากรอกข้อมูลใหม่อีกครั้ง .</center>
    </div><!-- /popover -->
  <?php }?>
    <div class="login_wrapper">
      <div class="form login_form">
        <section>
          <form class="login_content">
            <h1>สร้างบัญชีใหม่</h1>
          </form>
        <form id="demo-form2" method="post" action="" data-parsley-validate class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label" for="first-name">
              <span class="required fa fa-user"> *</span>ชื่อ
            </label>
            <div>
              <input type="text" id="first_name" name="first_name" placeholder="ตัวอย่างเช่น สมหมาย" required="required" class="form-control col-md-7 col-xs-12"
              />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="last_name">
              <span class="required fa fa-user"> *</span>นามสกุล
            </label>
            <div class="">
              <input type="text" id="last_name" name="last_name" placeholder="ตัวอย่่างเช่น ใจดี" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="user_email" class="control-label">
              <span class="required fa fa-envelope"> *</span>Email</label>
            <div class="">
              <input id="user_email" class="form-control" type="email" name="user_email" placeholder="Email สำหรับหรับใช้ติดต่อและเข้าสู่ระบบ"
                required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_password">
              <span class="required fa fa-key"> *</span>Password
            </label>
            <div class="">
              <input type="password" id="user_password" name="user_password" placeholder="รหัสผ่านสำหรับบัญชีนี้" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_password">
              <span class="required fa fa-key"> *</span>ยืนยัน Password
            </label>
            <div class="">
              <input type="password" id="user_password" name="user_password2" placeholder="ยืนยันรหัสผ่านสำหรับบัญชีนี้" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label"><span class="from-control fa fa-venus-double"> *</span>เพศ</label>
              <div>
                M:
                <input type="radio" class="flat" name="gender" id="genderM" value="M" /> F:
                <input type="radio" class="flat" name="gender" id="genderF" value="F" />
              </div>
          </div>
          <div class="item form-group">
            <label class="control-label" for="textarea">
              <span class="required fa fa-home"> *</span>ที่อยู่
            </label>
            <div class="">
              <textarea id="user_address" required="required" name="user_address" placeholder="ที่อยู่สำหรับใช้ติดต่อ" class="form-control resizable_textarea col-md-7 col-xs-12"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_phone">
              <span class="required fa fa-phone"> *</span>เบอร์โทร
            </label>
            <div class="">
              <input type="text" id="user_phone" name="user_phone" placeholder="เบอร์โทรศัพท์สำหรับใช้ติดต่อ" required="required" class="form-control fa col-md-7 col-xs-12" data-inputmask="'mask' : '999-999-9999'">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="login_content">
            <div class="form-group">
              <div class="">
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">ฉันมีบัญชีอยู่แล้ว ?
                <a href="../index.php" class="to_register"> เข้าสู่ระบบ </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-calendar"></i> ROOM RESERVATION</h1>
                <p>©2017 All Rights Reserved. Room Reservation </p>
              </div>
            </div>
          </div><!--login_content -->
        </form>
      </section>
      </div><!-- animate form registration_form -->
</div>
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick จะมาช่วยทำให้เว็บของเรานั้นเร็วปรื๊ดปร๊าด-->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress Progressbar สีเขียวตอนโหลดหน้า -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck เปลี่ยนcheckboxธรรมดาให้สวยๆมีสีสัน-->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Parsley ใช้ validate ข้อมูลที่อยู่ในฟอร์มว่าช่องไหนบ้างที่จำเป็นต้องกรอกแต่ไม่มีข้อมูล พร้อมแสดงขอบสีแดงในช่องที่ไม่มีข้อมูล-->
  <!-- <script src="vendors/parsleyjs/dist/parsley.min.js"></script> -->
  <!-- jquery.inputmask ใส่ขีดและเว้นวรรคเบอร์โทรให้อัตโนมัติ-->
  <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
</body>
</html>
