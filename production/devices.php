<?php
include '../public/function.php';
CheckAuthenticationAndAuthorization();
try {
  $conn = PDOConnector();
  $sql = "SELECT * FROM devices";
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
     <title>Devices | Management</title>
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
      <h2>จัดการข้อมูลอุปกรณ์</h2>
      <ul class="nav navbar-right">
        <li>
          <button class="btn btn-primary" id="add" data-toggle="modal" data-target="#addModal" data-placement="top" title="เพิ่มอุปกรณ์"><i class="fa fa-plus"></i> เพิ่มอุปกรณ์</button>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
  <br>
  <div class="table-responsive">
    <table id="datatable-responsive" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <!-- <tr BGCOLOR = "#2ecc71" style="color:#ffffff"> -->
        <tr>
          <th>#</th>
          <th>ภาพ</th>
          <th>สถานะ</th>
          <th width="27.5%">ชื่อ</th>
          <th width="27.5%">รายละเอียด</th>
          <th>จำนวนที่มี</th>
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
          <td><?=$i++;?></td>
          <td>
            <div class="media">
                <img src="images/media.jpg" class="img-responsive" style="width: 640px;">
            </div>
          </td>
          <td class="text-center">
            <!-- <center> -->
              <?php if ($data->device_status==0) { ?>
              <h4><span class="label label-danger" >ปิดใช้งาน</span></h4>
              <?php }else { ?>
              <h4><span class="label label-success"> เปิดใช้งาน </span></h4>
              <?php } ?>
            <!-- </center> -->
          </td>
          <td><h4><?=$data->device_name;?></h4></td>
          <td><h4><?=$data->device_detail;?></h4></td>
          <td class="text-center"><h4><?=$data->device_quantity;?></h4></td>
          <td class="text-center"><button type="button" name="view" class="btn btn-info view_data " id="<?=$data->device_id;?>"><i class="fa fa-eye"> ดูข้อมูล</i></button></td>
          <th class="text-center"><button type="button"  class="btn btn-success update_data" id="<?=$data->device_id;?>"><i class="fa fa-gear"> แก้ไข</i></button></th>
          <td class="text-center"><button type="button" name="delete" class="btn btn-danger delete_data" id="<?=$data->device_id;?>"><i class="fa fa-trash"> ลบ</i></button></td>
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
</div>
<?php include "crud-devices/viewModal.php";?>
<?php include "crud-devices/insertModal.php";?>
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
<!-- jquery.inputmask ใส่ขีดและเว้นวรรคเบอร์โทรให้อัตโนมัติ-->
<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
<script src="../vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script>
$(document).ready(function(){
  //ถ้ามีการกดปุ่ม เพิ่มสมาชิก
  $('#add').click(function(){
    $('#insert-form')[0].reset()//ให้รีเซ็ตข้อมูลที่อยู่ใน form ทั้งหมด
    $('#title').html("เพิ่มข้อมูล");//เพิ่มข้อความในใน title ของ Modal เป็น เพิ่มข้อมูล
    $('#insert').val("Save");//เปลี่ยนข้อความปุ่มที่มีไอดีชื่อ insert เป็น Save
  });
  //Insert
  $('#insert-form').on('submit',function(e){ //อ้างอิงถึง id ที่ชื่อ insert-form mี่อยู่ใน insertModal และเมื่อมีการกด submit ให้ทำ? /*ดูบรรทัดถัดไป*/
    e.preventDefault();//เวลาที่ทำการ debug ดูข้อมูลได้เลยไม่ต้องรีเฟสหน้า ใช้เพื่อดูการไหลของข้อมูลระหว่าง insert-form ไปยังไฟล์ insert.php
    var formData = new FormData($(this)[0]);
    $.ajax({ //เรียกใช้ ajax
      url:"crud-devices/insert.php", //ส่งข้อมูลไปที่ insert.php
      method:"post", //ด้วย method post
      data:formData,
      processData: false, //Not to process data
      contentType: false, //Not to set contentType
      //data:$('#insert-form').serialize(),//มัดข้อมูลร่วมกันแล้วส่งข้อมูลไปเป็นก้อนในรูปแบบ string
      beforeSend:function(){ //ก่อนที่จะส่งข้อมูล
        $('#insert').val("Save...");//ให้ทำการเปลี่ยนข้อความบนปุ่มที่มีไอดี insert เป็น Save...
      },
      success:function(data){// หากสงข้อมูลสำเร็จ
        console.log(data);//แสดงข้อมูลออกมาทาง console log
        $('#insert-form')[0].reset()//ให้รีเซ็ตข้อมูลที่อยู่ใน form ทั้งหมด
        $('#addModal').modal('hide');//ปิด Modal
        location.reload();//โหลดหน้าเว็บใหม่อีกครั้ง
      }
    });
  });
  //update
  $('.update_data').click(function(){//เมื่อมีการกดปุ่ม view_data
    var did=$(this).attr("id");//รับค่า id จากปุ่มวิวมาใส่ไว้ใน uid
    $.ajax({
      url:"crud-devices/fetch.php",
      method:"post",
      data:{device_id:did},
      dataType:"json",
      success:function(data){
        console.log(data);
        $('#id').val(data.device_id);//เปลี่ยนข้อมูลใน insertModal เป็นค่าที่อยู่ใน data.user_id
        $('#device_name').val(data.device_name);
        $('#device_detail').val(data.device_detail);
        //$('#room_image').val(data.room_image);
        $('#category').val(data.category);
        $('#device_status').val(data.device_status);
        $('#device_quantity').val(data.device_quantity);
        $('#title').html("แก้ไขข้อมูล");//เพิ่มข้อความในใน title ของ Modal เป็น แก้ไขข้อมูล
        $('#insert').val("Update");//เปลี่ยนข้อมความในปุ่ม insert เป็น Update
        $('#addModal').modal('show');
      }
    });
  });
//delete
  $('.delete_data').click(function(){//ตรวจสอบคลาส delete_data เมื่อมีการกดปุ่ม
    var did=$(this).attr("id");//รับค่า id จากปุ่มdeleteมาใส่ไว้ใน uid
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
                $.ajax({  url:"crud-devices/delete.php", //ส่งข้อมูลไปทีไฟล์ delete.php
                          method:"post", //ด้วย method post
                          data:{device_id:did},//ส่งข้อมูลไปในรูปแบบ JSON
                          success:function(data){ // หากส่งข้อมูลสำเร็จ
                            console.log(data);
                            swal(
                              'ลบเรียบร้อยแล้ว!',
                              'คุณได้ลบข้อมูลนี้แล้ว.',
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
    var did=$(this).attr("id");//รับค่า id จากปุ่มวิวมาใส่ไว้ใน uid
    $.ajax({
      url:"crud-devices/select.php", //ส่งข้อมูลไปทีไฟล์ select.php
      method:"post", //ด้วย method post
      data:{device_id:did},//ส่งข้อมูลไปในรูปแบบ JSON
      success:function(data){ // หากส้งข้อมูลสำเร็จ
        $('#detail').html(data);//นำข้อมูลไปแสดงที่ Modal body ตรง id detail ในไฟล์ viewModal.php
        $('#dataModal').modal('show');//เรียก Modal มาแสดง
      }
    });
  });
});
</script>
<?php $conn='';?>
