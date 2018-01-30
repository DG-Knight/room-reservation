<!--modal-->
<div class="modal fade" id="chooseModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="title">เพิ่มข้อมูลการจองห้อง</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="insert-booking" method="post">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label>หัวข้อ</label>
                <input type="text" class="form-control" name="Subject" id="subject" placeholder="EX.จัดการประชุมวิชาการประจำปี" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label>ชื่อผู้ข้อจอง</label>
                <input type="hidden" name="User_ID" value="<?=$_SESSION['AUTHEN']['UID'];?>">
                <input type="text" class="form-control" name="UserName" value="<?=$_SESSION['AUTHEN']['UNAME'] ." ". $_SESSION['AUTHEN']['ULAST'];?>">
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label>ห้องที่จอง</label>
                  <input type="hidden"id="room_id" name="RoomID">
                  <input type="text" class="form-control" id="room_name" name="RoomName" disabled >
              </div>
            </div>
          </div>

          <div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>วันที่เริ่ม</label>
                <input name="StartDate" type="text" name="StartDate" value="<?php echo $startDate;?>" class="form-control" title="Period">
              </div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>เวลาที่เริ่ม</label>
                <input name="StartTime" type="text" name="StartTime" value="<?php echo $startTime;?>" class="form-control" title="Location">
              </div>
						</div>
					</div>

          <div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>วันที่สิ้นสุด</label>
                <input type="text" name="EndDate" value="<?=$endDate;?>" class="form-control" title="Period">
              </div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>เวลาทีสิ้นสุด</label>
                <input name="EndTime" type="text" value="<?=$endTime;?>" class="form-control" title="Location">
              </div>
						</div>
					</div>

          <div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>จำนวนผู้ใช้/คน</label>
                <input name="People" type="text" class="form-control" title="Period" required "กรุณาป้อนจำนวนผู้เข้าร่วมด้วยค่ะ">
              </div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>เบอร์โทรติดต่อ</label>
                <input name="Phone" type="text" value="<?=$_SESSION['AUTHEN']['UPHONE'];?>" class="form-control" title="Location">
                <input type="hidden" name="Status" value="0">
              </div>
						</div>
					</div>

      </div><!--modal body-->
      <div class="modal-footer">
        <input type="submit" id="insert" name="InsertBooking" value="Save" class="btn btn-primary" />
      </form>
        <button type="button" class="btn btn-default "id="close"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
