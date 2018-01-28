<!--modal-->
<div class="modal fade" id="chooseModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="title">เพิ่มข้อมูลการจองห้อง</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post">
          <input type="hidden" id="room_id" name="room_id">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label>หัวข้อ</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="EX.จัดการประชุมวิชาการประจำปี" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label>ชื่อผู้ข้อจอง</label>
                <input type="text" class="form-control" name="user" value="<?=$_SESSION['AUTHEN']['UNAME'] ." ". $_SESSION['AUTHEN']['ULAST'];?>">
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label>ห้องที่จอง</label>
                  <input type="text" class="form-control" id="room_name" name="room_name" disabled >
              </div>
            </div>
          </div>

          <div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>วันที่เริ่ม</label>
                <input id="period" name="period" type="text" class="form-control" title="Period">
              </div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>เวลาที่เริ่ม</label>
                <input id="location" name="location" type="text" class="form-control" title="Location">
              </div>
						</div>
					</div>

          <div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>วันที่สิ้นสุด</label>
                <input id="period" name="period" type="text" class="form-control" title="Period">
              </div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>เวลาทีสิ้นสุด</label>
                <input id="location" name="location" type="text" class="form-control" title="Location">
              </div>
						</div>
					</div>

          <div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>จำนวนผู้เข้าร่วม</label>
                <input id="period" name="period" type="text" class="form-control" title="Period">
              </div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
					  	<div class="form-group">
                <label>เบอร์โทรติดต่อ</label>
                <input id="location" name="location" type="text" class="form-control" title="Location">
              </div>
						</div>
					</div>


      </div><!--modal body-->
      <div class="modal-footer">
        <input type="submit" id="insert" value="Save" class="btn btn-primary" />
      </form>
        <button type="button" class="btn btn-default "id="close"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
