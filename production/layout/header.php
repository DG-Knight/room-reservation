<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?php
              if ($_SESSION['AUTHEN']['UIMAGE']) {
                $fileName = 'images/'.$_SESSION['AUTHEN']['UIMAGE'];
                if( file_exists($fileName) ){
                  //echo "มีไฟล์";
                  echo '<img src="'.$fileName.'">';
                }else{
                //echo "ไม่มีไฟล์";
                  $fileName =  "images/no-user-image.png";
                  echo '<img src="'.$fileName.'">';
                }
              }else {
                $fileName =  "images/no-user-image.png";
                echo '<img src="'.$fileName.'">';
              }
            ?>
            <?php echo $_SESSION['AUTHEN']['UNAME']."&nbsp".$_SESSION['AUTHEN']['ULAST']?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href=""> Profile</a></li>
            <li>
              <a href="">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
            </li>
            <li><a href="">Help</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> ออกจากระบบ </a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <div class="text-center">
                <a>
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
