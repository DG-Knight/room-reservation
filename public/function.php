<?php
# PHP 5.6.28
session_start();
date_default_timezone_set("Asia/Bangkok");

include('constant.php');
$conn = '';
//CONNECTION
function PDOConnector(){
	  try {
	    $conn = new PDO('mysql:host='.DB_SER.';dbname='.DB_NAME.';charset=utf8', DB_USR, DB_PWD);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	    return $conn;
	  }catch(PDOException $e){ return null;}
}

// Authentication
function Authentication($user_email, $user_password){

	  $conn = PDOConnector();
	  $comm = 'SELECT * FROM users WHERE user_email="'.$user_email.'" AND user_password="'.$user_password.'" AND user_status=1 LIMIT 1';

	  $query = $conn->prepare($comm);
	  $query ->execute();

	  if($query->rowCount()>0){
		$authen = $query -> fetch(PDO::FETCH_OBJ);

		$_SESSION['AUTHEN']['UID'] = $authen->user_id;
		$_SESSION['AUTHEN']['UNAME'] = $authen->first_name;
		$_SESSION['AUTHEN']['ULAST'] = $authen->last_name;
		$_SESSION['AUTHEN']['UEMAIL'] = $authen->user_email;
		$_SESSION['AUTHEN']['ULEVEL'] = $authen->level_id;
		$_SESSION['AUTHEN']['USEX'] = $authen->user_sex;
		$_SESSION['AUTHEN']['UIMAGE'] = $authen->user_image;
		$_SESSION['AUTHEN']['UADDRESS'] = $authen->user_address;
		$_SESSION['AUTHEN']['UPHONE'] = $authen->user_phone;
		$_SESSION['AUTHEN']['UREGISTERED'] = $authen->user_registered;

		return true;
		$conn = '';
	  }else{ return false; }
}

// CHECK AUTHENTICATION AND AUTHORIZATION
function CheckAuthenticationAndAuthorization(){
	  if(!isset($_SESSION['AUTHEN']['UID'])){
	    header('location: ../index.php');
	    die();
	  }
}
	//Register ฟังก์ชันสมัครสมาชิก
	# levelid 0 = ผู้ดูแลระบบ
	# levelid 1 = สมาชิก
	# status 0 = ไม่อนุญาตให้ใช้งาน
	# status 1 = อนุญาตให้ใช้งาน
	function Register($first_name,$last_name,$user_sex,$user_address,
										$user_phone,$user_email,$user_password){

		$datetime = new DateTime();
    $user_registered = $datetime->format('Y-m-d H:i:s');//รับค่าข้อมูลวันเวลาปัจจุบันเพื่อใช้บันทึกวันเวลาที่สมาชิกสมัครใช้งานระบบ
		$level_id = 1;// = 1 เพราะผู้สมัครจะมีสถานะเป็นสมาชิกเท่านั้น
		$user_status = 0;// กำหนดให้ค่่าเริ่มต้นของผู้สมัครเป็นผู้ที่ยังไม่ได้รับอนุญาตให้ใช้งานระบบ

		$conn = PDOConnector();
		$comm = 'INSERT INTO users(first_name, last_name, user_sex, user_address, user_phone, user_email, user_password, user_registered, 	level_id, user_status) VALUES(:first_name, :last_name, :user_sex, :user_address, :user_phone, :user_email, :user_password, :user_registered, :level_id, :user_status)';
		$query = $conn->prepare($comm);
		$result = $query->execute(array(
										    'first_name' => $first_name,
												'last_name' => $last_name,
										    'user_sex' => $user_sex,
										    'user_address' => $user_address,
										    'user_phone' => $user_phone,
										    'user_email' => $user_email,
												'user_password' => $user_password,
												'user_registered' => $user_registered,
												'level_id' => $level_id,
												'user_status' => $user_status
										  ));
		return $result;
    $conn = '';
	}
function GetImageProfile(){
	if ($_SESSION['AUTHEN']['UIMAGE']) {
			$fileName = 'images/'.$_SESSION['AUTHEN']['UIMAGE'];
			if( file_exists($fileName) ){
				//echo "มีไฟล์";
				echo '<img src="'.$fileName.'" class="img-circle profile_img">';
			}else{
				//echo "ไม่มีไฟล์";
				$fileName =  "images/no-user-image.png";
				echo '<img src="'.$fileName.'" class="img-circle profile_img">';
			}
		}else {
			$fileName =  "images/no-user-image.png";
			echo '<img src="'.$fileName.'" class="img-circle profile_img">';
	}
}

	function DeleteRoom($id){
		$conn = PDOConnector();
		$sql = "DELETE FROM rooms WHERE room_id=$id";
	  $query = $conn->prepare($sql);
	  $result = $query ->execute();
		return $result;
	}
?>
