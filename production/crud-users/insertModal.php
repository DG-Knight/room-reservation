<div class="modal fade" id="addModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="title" class="modal-title"></h4>
      </div>
      <div class="modal-body" >
        <form method="post" id="insert-form" data-parsley-validate class="form-horizontal">
          <div class="form-group">
            <label class="control-label" for="first-name">
              <span class="required fa fa-user"> *</span>ชื่อ
            </label>
            <div>
              <input type="hidden" id="id" name="user_id" />
              <input type="text" id="first_name" name="first_name" placeholder="ตัวอย่างเช่น สมหมาย" required="required" class="form-control col-md-7 col-xs-12"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="last_name">
              <span class="required fa fa-user"> *</span>นามสกุล
            </label>
            <div class="">
              <input type="text" id="last_name" name="last_name" placeholder="ตัวอย่่างเช่น ใจดี" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="user_email" class="control-label">
              <span class="required fa fa-envelope"> *</span>Email</label>
            <div class="">
              <input id="user_email" class="form-control" type="email" name="user_email" placeholder="Email สำหรับหรับใช้ติดต่อและเข้าสู่ระบบ" required="required" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_password">
              <span class="required fa fa-key"> *</span>Password
            </label>
            <div class="">
              <input type="password" id="user_password" name="user_password" placeholder="รหัสผ่านสำหรับบัญชีนี้" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label"><span class="from-control fa fa-venus-double"> *</span>เพศ</label>
              <div>
                M:
                <input type="radio" class="flat" name="gender" id="genderM" value="M"/> F:
                <input type="radio" class="flat" name="gender" id="genderF" value="F"/>
              </div>
          </div>
          <div class="item form-group">
            <label class="control-label" for="textarea">
              <span class="required fa fa-home"> *</span>ที่อยู่
            </label>
            <div class="">
              <textarea id="user_address" required="required" name="user_address" placeholder="ที่อยู่สำหรับใช้ติดต่อ" class="form-control resizable_textarea col-md-7 col-xs-12"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_phone">
              <span class="required fa fa-phone"> *</span>เบอร์โทร
            </label>
            <div class="">
              <input type="text" id="user_phone" name="user_phone" placeholder="เบอร์โทรศัพท์สำหรับใช้ติดต่อ" required="required" class="form-control fa col-md-7 col-xs-12" data-inputmask="'mask' : '999-999-9999'">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_phone">
              <span class="required fa fa-user"> *</span>กำหนดระดับผู้ใช้งาน
            </label>
            <div>
              <select class="form-control" name="level_id" id="level_id">
                <option id="level_id" value="">---เลือก---</option>
                <option id="level_id" value="0">ผู้ดูแลระบบ</option>
                <option id="level_id" value="1">สมาชิกทั่วไป</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_phone">
              <span class="required fa fa-user"> *</span>การอนุญาตให้ใช้งาน
            </label>
            <div>
              <select class="form-control" name="user_status" id="user_status">
                <option id="user_status" value="">---เลือก---</option>
                <option value="1">เปิด</option>
                <option value="0">ปิด</option>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" id="insert" value="Save" class="btn btn-primary" />
      </form>
        <button type="button" class="btn btn-default "id="close"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
