<?php
if ($query->rowCount()>0) {
    echo "ไม่เย้";
  echo "<script>
          alert('ห้องและเวลาที่ท่านเลือกเต็มแล้วค่ะ!')
          window.location ='booking.php';
        </script>";
}else{
  echo "เย้";
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
      <a><?=$data->room_name?></a>
      <br />
      <small> <?php //echo "วันที่"."<br>".$data->booking_start_date." - ".$data->booking_stop_date."<br>เวลา ".$data->booking_start_time." - ".$data->booking_stop_time;?></small>
    </td>

    <td class="project_progress">
      <?=$data->room_detail?>
    </td>

    <td>
      <button class="btn btn-success btn-round"><i class="fa fa-check"></i> ว่าง </button>
    </td>

    <td>
      <center><a href="#" id="<?=$data->room_id?>" class="btn btn-primary choose"><i class="fa fa-check"></i> จอง </a><center>
    </td>

  </tr>
<?php }}//EndRowCount&&WhileLoop ?>
