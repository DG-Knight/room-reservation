<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-cloud"></i> <span>R-Reservation</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>ยินดตอนรับ</span>
        <h2><?php echo $_SESSION['AUTHEN']['UNAME']."&nbsp".$_SESSION['AUTHEN']['ULAST']?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>เมนู</h3>
        <ul class="nav side-menu">
          <li><a href="index.php"><i class="fa fa-home"></i> หน้าหลัก </a>
          <li><a href="calendar.php"><i class="fa fa-calendar"></i> ปฏิทินการใช้ห้อง </a>
          <li><a><i class="fa fa-edit"></i> ข้อมูลห้อง <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="booking.php"> จองห้อง </a></li>
              <li><a href="ask-booking.php"> สอบถามการจอง </a></li>
              <li><a href="index.php?file=b-history"> ประวัติการจอง </a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> ข้อมูลอุปกรณ์ <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="index.php?file=borrow"> ยืมอุปกรณ์ </a></li>
              <li><a href="index.php?file=b-history"> สอบถามการยืม </a></li>
              <li><a href="index.php?file=br-history"> ประวัติการยืม/คืนอุปกรณ์ </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--section admin menu-->
      <?php if ($_SESSION['AUTHEN']['ULEVEL']==0) { ?>
      <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-cogs"></i> Configuration <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="users.php">จัดการสมาชิก</a></li>
              <li><a href="rooms.php">จัดการห้อง</a></li>
              <li><a href="devices.php">จัดการอุปกรณ์</a></li>
              <li><a href="index.php?file=active-booking">อนุมัติการจองห้อง</a></li>
              <li><a href="index.php?file=active-borrow">อนุมัติการยืมอุปกรณ์</a></li>
              <li><a href="inex.php?file=return-devices"> คืนอุปกรณ์ </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <?php } ?>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <!-- <div class="sidebar-footer hidden-small"> -->
      <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a> -->
      <!-- <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div> -->
    <!-- /menu footer buttons -->
  </div>
</div>
