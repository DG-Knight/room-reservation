
  <div class="x_panel">
    <div class="x_title">

      <center><h2>วัน/เวลาทีต้องการจอง</h2></center>

      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <center>
        <h4> <small> กรุณาเลือกวันและเวลาที่ท่านต้องการจองค่ะ !</small></h4>
      </center>
     <!-- DateTimePicker StartDate -->
     <div class="row">
       <form id="search-form" method="post">
       <div class="form-group">
       <lable><strong>วันที่เริ่ม</strong></label>
           <div class="has-feedback">
             <input  id="StartDate" name="StartDate" type="text" class="form-control has-feedback-left" title="StartDate" style="padding-left:55px;" placeholder="" aria-describedby="inputSuccess2Status3" required >
             <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
           </div>
         </div>
     </div>

     <div class="row">
     <div class="form-group">
         <label><strong>เวลาที่เริ่ม</strong></label>
                   <div class="input-group date" id="StartTime">
                             <input type="text" name="StartTime" class="form-control" required>
                             <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                             </span>
                    </div>
     </div>
   </div>

     <!-- DateTimePicker EndDate -->
     <div class="row">
           <div class="form-group">
             <lable><strong>วันที่สิ้นสุด</strong></label>
               <div class="has-feedback">
                  <input  id="EndDate" name="EndDate" type="text" class="form-control has-feedback-left" title="EndDate" style="padding-left:55px;" placeholder="" aria-describedby="inputSuccess2Status3" required>
                  <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
               </div>
           </div>
     </div>

     <div class="row">
     <div class="form-group">
         <label><strong>เวลาที่สิ้นสุด</strong></label>
                   <div class="input-group date" id="EndTime">
                             <input type="text" name="EndTime" class="form-control" required>
                             <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                             </span>
                    </div>
     </div>
   </div>

   <div class="row">
     <center><button type="submit" name="search-rooms" class="btn btn-round btn-primary"><i class="fa fa-search"></i> ค้นหาห้องว่าง</button></center>
     </form>
   </div>

   </div><!--/x_content-->
   </div>
