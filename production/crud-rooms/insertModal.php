<!--modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="title">เพิ่มข้อมูลห้อง</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" id="insert-form" enctype="multipart/form-data">

          <div class=" item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span>ชื่อห้อง
            </label>
            <div>
              <input type="hidden" id="id" name="room_id" />
              <input type="text" class="form-control" id="room_name" name="room_name" placeholder="ชื่อห้อง"/>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span>ประเภทห้อง
            </label>
            <div class="">
              <select class="form-control" id="room_category" name="room_category"placeholder="เลือกประเภท">
                <option >--ประเภทห้อง--</option>
                <option value="1">ห้องประชุม</option>
                <option value="2">ห้องเรียน</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label" for="textarea">
              <span class="required fa fa-home"> *</span>คำอธิบาย
            </label>
            <div class="">
              <textarea id="room_detial"  name="room_detial" placeholder="Ex.เป็นห้องที่ใช้สำหรับจัดประชุมรองรับคนได้ 100 ที่นั่ง" class="form-control resizable_textarea col-md-7 col-xs-12"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label">
              <i class="fa fa-upload"></i> เลือกภาพ
            </label>
            <input type="file" name="room_image" id="room_image" accept="image/*">
          </div>

          <div class="item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span> เปิด/ปิดใช้งานห้อง
            </label>
            <div>
              <select class="form-control" name="room_status" id="room_status">
                <option>---เลือก---</option>
                <option id="room_status" value="1">เปิด</option>
                <option id="room_status" value="0">ปิด</option>
              </select>
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
