<!--modal-->
<div class="modal fade" id="addModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="title">เพิ่มข้อมูลอุปกรณ์</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" id="insert-form" enctype="multipart/form-data">

          <div class=" item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span>ชื่ออุปกรณ์
            </label>
            <div>
              <input type="hidden" id="id" name="device_id" />
              <input type="text" class="form-control" id="device_name" name="device_name" placeholder="ชื่ออุปกรณ์"/>
            </div>
          </div>
          
          <div class="item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span>ประเภทเภทอุปกรณ์
            </label>
            <div class="">
              <select class="form-control" id="category" name="category">
                <option >---เลือกประเภท---</option>
                <option value="1">เครื่องเสียง</option>
                <option value="2">เครื่องมือช่าง</option>
                <option value="3">อุปกรณ์ IoT</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label" for="textarea">
              <span class="required fa fa-home"> *</span>คำอธิบาย
            </label>
            <div class="">
              <textarea id="device_detail"  name="device_detail" placeholder="Ex.เป็นอุปกรณ์ที่ใชในการซ่อมบำรุ่ง" class="form-control resizable_textarea col-md-7 col-xs-12"></textarea>
            </div>
          </div>
          <div class=" item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span>จำนวนอุปกรณ์
            </label>
            <div>
              <input type="text" class="form-control" id="device_quantity" name="device_quantity" placeholder="จำนวนอุปกรณ์"/>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label">
              <i class="fa fa-upload"></i> เลือกภาพ
            </label>
            <input type="file" name="device_image" id="device_image" accept="image/*">
          </div>

          <div class="item form-group">
            <label class="control-label">
              <span class="required fa fa-home"> *</span> เปิด/ปิดใช้งาน
            </label>
            <div>
              <select class="form-control" name="device_status" id="device_status">
                <option>---เลือก---</option>
                <option id="device_status" value="1">เปิด</option>
                <option id="device_status" value="0">ปิด</option>
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
