<?php
session_start();
unset($_SESSION['AUTHEN']['UID']);
unset($_SESSION['AUTHEN']['UNAME']);
unset($_SESSION['AUTHEN']['ULAST']);
unset($SESSION['AHTHEN']['UEMAIL']);
unset($_SESSION['AUTHEN']['ULEVEL']);
unset($_SESSION['AUTHEN']['USEX']);
unset($_SESSION['AUTHEN']['UADDRESS']);
unset($_SESSION['AUTHEN']['UPHONE']);
unset($_SESSION['AUTHEN']['UREGISTERED']);
header('location: ../index.php');
die();
 ?>
