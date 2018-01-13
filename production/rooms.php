<?php
include '../public/function.php';
CheckAuthenticationAndAuthorization();
try {
  $conn = PDOConnector();
  $sql = "SELECT * FROM rooms";
  $query = $conn->prepare($sql);
  $query ->execute();
} catch (\Exception $e) {
  echo "ไม่สามารถดึงข้อมูลได้: " .$e->getMessage();
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

     <title>Rooms | </title>

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
     <!-- sweetalert2 -->
     <link rel="stylesheet" href="../vendors/sweetalert2/dist/sweetalert2.min.css">
   </head>

   <body class="nav-md footer_fixed" >
     <div class="container body">
       <div class="main_container">
         <?php include_once 'menu.php'?>
         <?php include_once 'header.php'?>
         <div class="right_col" role="main">
           <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>จัดการข้อมูลห้อง</h2>
      <ul class="nav navbar-right">
        <li>
          <button class="btn btn-primary" id="add" data-toggle="modal" data-target="#addModal" data-placement="top" title="เพิ่มห้อง"><i class="fa fa-plus"></i> เพิ่มห้อง</button>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
  <br>
  <div class="table-responsive">
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>ชื่อ</th>
          <th>รูปภาพ</th>
          <th>สถานะ</th>
          <th width="10%">ดูข้อมูล</th>
          <th width="10%">แก้ไข</th>
          <th width="10%">ลบ</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($query->rowCount()>0) {
          $i = 1;
          while ($data = $query -> fetch(PDO::FETCH_OBJ)) {
        ?>
        <tr>
          <th><?=$i++;?></th>
          <th><?=$data->room_name;?></th>
          <th><?=$data->room_image;?></th>
          <th>
            <center>
              <?php if ($data->room_status==0) { ?>
              <label  class="label label-danger" >ปิดใช้งาน</label>
              <?php }else { ?>
              <label class="label label-success"> เปิดใช้งาน </label>
              <?php } ?>
            </center>
          </th>
          <th><center><button type="button" name="view" class="btn btn-info view_data " id="<?=$data->room_id;?>"><i class="fa fa-eye"> ดูข้อมูล</i></button></center></th>
          <th><center><button type="button" name="edit" class="btn btn-success update_data" id="<?=$data->room_id;?>"><i class="fa fa-gear " id="edit"> แก้ไข</i></button></center></th>
          <th><center><button type="button" name="delete" class="btn btn-danger delete_data" id="<?=$data->room_id;?>"><i class="fa fa-trash"> ลบ</i></button></center></th>
        </tr>
        <?php }} ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php include "crud-rooms/viewModal.php";?>
<?php include "crud-rooms/insertModal.php";?>
<?php include_once 'footer.php'?>
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
<script src="../vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script>
$(document).ready(function(){
  //ถ้ามีการกดปุ่ม เพิ่มสมาชิก ให้ทำการเซ็ตค่าใน textbox เป็นค่าว่าง
  $('#add').click(function(){
    $('#title').html("เพิ่มข้อมูล");//เพิ่มข้อความในใน title ของ Modal เป็น เพิ่มข้อมูล
    $('#id').val("");
    $('#first_name').val("");//textbox id first_name เป็นค่าว่าง
    $('#last_name').val("");//textbox id last_name เป็นค่าว่าง
    $('#user_email').val("");//textbox id user_email เป็นค่าว่าง
    $('#user_address').val("");
    $('#user_phone').val("");
    $('#level_id').val("");
    $('#user_status').val("");
    $('#user_password').val("");
  });
  //ถ้ามีถ้ามีการกดปุ่มแก้ไข
  $('#edit').click(function(){
    $('#title').html("แก้ไขข้อมูล");//เพิ่มข้อความในใน title ของ Modal เป็น แก้ไขข้อมูล
  });
//delete
  $('.delete_data').click(function(){//ตรวจสอบคลาส delete_data เมื่อมีการกดปุ่ม
    var uid=$(this).attr("id");//รับค่า id จากปุ่มdeleteมาใส่ไว้ใน uid
    //var status=confirm("Are you want delete ?");
    swal({title: 'แน่ใจแล้วหรือ?',
        text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, ฉันต้องการลบ!'
        }).then((result) => {
            if (result.value) {//เช็กค่าว่าเป็น T|F
                console.log(result.value);//ปริ้นค้าออกทาง console log
                $.ajax({  url:"crud-rooms/delete.php", //ส่งข้อมูลไปทีไฟล์ delete.php
                          method:"post", //ด้วย method post
                          data:{room_id:uid},//ส่งข้อมูลไปในรูปแบบ JSON
                          success:function(data){ // หากส่งข้อมูลสำเร็จ
                            console.log(data);
                            swal(
                              'ลบเรียบร้อยแล้ว!',
                              'ห้องนี้ได้ถูกลบแล้ว.',
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
//View
  $('.view_data').click(function(){//เมื่อมีการกดปุ่ม view_data
    var uid=$(this).attr("id");//รับค่า id จากปุ่มวิวมาใส่ไว้ใน uid
    $.ajax({
      url:"crud-rooms/select.php", //ส่งข้อมูลไปทีไฟล์ select.php
      method:"post", //ด้วย method post
      data:{room_id:uid},//ส่งข้อมูลไปในรูปแบบ JSON
      success:function(data){ // หากส้งข้อมูลสำเร็จ
        $('#detail').html(data);//นำข้อมูลไปแสดงที่ Modal body ตรง id detail ในไฟล์ viewModal.php
        $('#dataModal').modal('show');//เรียก Modal มาแสดง
      }
    });
  });
});
</script>
