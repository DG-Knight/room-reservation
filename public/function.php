<?php
# PHP 5.6.28
	session_start();
	date_default_timezone_set("Asia/Bangkok");

	include('constant.php');
	require_once('php-class-upload/class.upload.php') ;// Include คลาส class.upload.php เข้ามา เพื่อจัดการรูปภาพ

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

	// upload_image
	function UploadImage($img_name){
		$image_name = '';
		// เริ่มต้นใช้งาน class.upload.php ด้วยการสร้าง instant จากคลาส
    $upload_image = new upload($img_name) ; // $_FILES['image_name'] ชื่อของช่องที่ให้เลือกไฟล์เพื่ออัปโหลด

    //  ถ้าหากมีภาพถูกอัปโหลดมาจริง
    if ( $upload_image->uploaded ) {

        // ย่อขนาดภาพให้เล็กลงหน่อย  โดยยึดขนาดภาพตามความกว้าง  ความสูงให้คำณวนอัตโนมัติ
        // ถ้าหากไม่ต้องการย่อขนาดภาพ ก็ลบ 3 บรรทัดด้านล่างทิ้งไปได้เลย
        $upload_image->image_resize         = true ; // อนุญาติให้ย่อภาพได้
        $upload_image->image_x              = 400 ; // กำหนดความกว้างภาพเท่ากับ 400 pixel
        $upload_image->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ

        $upload_image->process( "upload_images" ); // เก็บภาพไว้ในโฟลเดอร์ที่ต้องการ  *** โฟลเดอร์ต้องมี permission 0777

        // ถ้าหากว่าการจัดเก็บรูปภาพไม่มีปัญหา  เก็บชื่อภาพไว้ในตัวแปร เพื่อเอาไปเก็บในฐานข้อมูลต่อไป
        if ( $upload_image->processed ) {

            $image_name =  $upload_image->file_dst_name ; // ชื่อไฟล์หลังกระบวนการเก็บ จะอยู่ที่ file_dst_name
            $upload_image->clean(); // คืนค่าหน่วยความจำ

        }// END if ( $upload_image->processed )

    }//END if ( $upload_image->uploaded )
		return $image_name;
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
	function DeleteRoom($id){
		$conn = PDOConnector();
		$sql = "DELETE FROM rooms WHERE room_id=$id";
	  $query = $conn->prepare($sql);
	  $result = $query ->execute();
		return $result;
	}
?>
