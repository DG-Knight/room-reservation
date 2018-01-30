<div class="col-md-12 col-sm-12 col-xs-12"><!--col show allow room-->
  <div class="x_panel">
    <div class="x_title">
      <h2>รายการรอการอนุมัติ</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

       <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- start project list -->
      <div class="table-responsive">
        <table class="table table-hover projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 10%">ภาพ</th>
              <th style="width: 10%">ชื่อห้อง</th>
              <th style="width: 20%">รายละเอียด</th>
              <th>วัน/เวลาที่จอง</th>
              <th>วัน/เวลาที่คืนห้อง</th>
              <th>ดูข้อมูล</th>
              <th style="width: 5%"><center>สถานะ</center></th>
              <th style="width: 5%"><center>#</center></th>
            </tr>
          </thead>
        <tbody>
          <?php
             if ($query->rowCount()>0) {
               $i = 1;
               while ($data = $query -> fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?=$i++ ?></td>
                  <td>
                    <a class="image view view-first">
                      <?php
                      if ($data->room_image) {
                        $fileName = 'images/room-img/'.$data->room_image;
                        //echo $fileName;
                        if( file_exists($fileName) ){
                          //echo "มีไฟล์";
                          echo '<img src="'.$fileName.'" style="width:100px">';
                        }else{
                          //echo "ไม่มีไฟล์";
                          $fileName =  "images/noimage.jpg";
                          echo '<img src="'.$fileName.'" style="width:100px">';
                        }
                      }else {
                        $fileName =  "images/noimage.jpg";
                        echo '<img src="'.$fileName.'" style="width:100px">';
                      }
                  ?>
                </a>
              </td>

              <td>
                <a><?=$data->room_name;?></a>
                <br />
                <small> <?php //echo "วันที่"."<br>".$data->booking_start_date." - ".$data->booking_stop_date."<br>เวลา ".$data->booking_start_time." - ".$data->booking_stop_time;?></small>
              </td>

              <td>
                <?=$data->booking_subject;?>
              </td>
              <td>วันที่ : <?=$data->booking_start_date;?><br />เวลา : <?=$data->booking_start_time;?></td>
              <td>วันที่ : <?=$data->booking_end_date;?><br />เวลา : <?=$data->booking_end_time;?></td>
              <td class="text-center"><button type="button" name="view" class="btn btn-info view_data " id="<?=$data->booking_id;?>"><i class="fa fa-eye"> ดูข้อมูล</i></button></td>
              <td><center>
                <?php
                if ($data->booking_status==0) {
                    $status = "รออนุมัติ";
                    echo '<button class="btn btn-warning btn-round" style="width:100%">'.$status.'</button>';
                  }elseif ($data->booking_status==1) {
                    $status = "อนุมัติ";
                    echo '<button class="btn btn-success btn-round" style="width:100%">'.$status.'</button>';
                  }elseif($data->booking_status==2){
                    $status = "ไม่อนุมัติ";
                    echo '<button class="btn btn-danger btn-round" style="width:100%">'.$status.'</button>';
                  }?></center>
              </td>

              <td>
                <center><a id="<?=$data->booking_id?>" class="btn btn-success allow" style="width:100%"><i class="fa fa-check"></i> อนุมัติ </a><center>
                <center><a id="<?=$data->booking_id?>" class="btn btn-danger block" style="width:100%"><i class="fa fa-close"></i> ไม่อนุมัติ </a><center>
              </td>

            </tr>
          <?php }}//EndRowCount&&WhileLoop ?>

        </tbody>
      </table>
      </div>
     </div>
      <!-- end project list -->

    </div>
  </div>
</div>
