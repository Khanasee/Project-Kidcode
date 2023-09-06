<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
session_start();
require('../condb.php');
$q = ($_GET['q']);

$t = date("Y")+543;
$date = date("d/m/");
$datenow = $date.$t;

$sql = "SELECT * FROM class_schedule INNER JOIN student ON class_schedule.class_schedule_student = student.student_id INNER JOIN attend_class ON attend_class.attend_class_schedule = class_schedule.class_schedule_id WHERE class_schedule.class_schedule_teacher = '$q' AND class_schedule.class_schedule_status = 'ชำระแล้ว'";
$result = mysqli_query($conn,$sql);
$sql2 = "SELECT * FROM class_schedule  WHERE class_schedule.class_schedule_teacher = '$q'";
$result2 = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
  $subject = $row['class_schedule_subject'];
}

$r=1;
?>
  
<div class="form-group">
              <label for="major">วันที่</label>
              <input type="text" class="form-control col-sm-12" id="major" name="major" value="<?php echo $datenow;?>">
            </div>
            <h3 class="card-title"></h3>
  
  <div class="row">
<div class="col-12">
  <div class="card">
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 600px;">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>ครั้งที่</th>
            <th>บทที่</th>
            <th>เช็คชื่อ</th>
            <th>ไฟล์ผลงาน</th>
            <th>แสดงความคิดเห็น</th>
          </tr>
        </thead>
        <tbody>
      
        <?php while($row = mysqli_fetch_assoc($result)){?>
          <tr>
            <td><?php echo $r++;?></td>
            <td><?php echo $row['student_fullname'];?></td>
            <td><?php echo $row['attend_class_num'];?></td>
            <td><select class="form-control select2 select2-info" name="chapter[]" data-dropdown-css-class="select2-info" style="width: 100%;">
                  <option selected="selected"></option>
                  <?php $check = $row['class_schedule_id'];
                  $sel = "SELECT * FROM attend_history WHERE attend_history_class = '$check'";
                  $result_sel = mysqli_query($conn, $sel);
                  $row_num = mysqli_num_rows($result_sel);

                  if($row_num == 0){
                    $select = "SELECT * FROM detail_subject WHERE subject_id = '$subject'";
                    $result_select = mysqli_query($conn, $select);
                    while($row2 = mysqli_fetch_array($result_select, MYSQLI_ASSOC)){?>
                      <option value="<?php echo $row2['chapter_num'];?>"><?php echo "บทที่".$row2['chapter_num']." ".$row2['chapter'];?></option>
                  <?php
                    }
                  }
                  if($row_num != 0){
                    $no = array();
                    $id = $row['student_id'];
                    $check = "SELECT * FROM attend_history INNER JOIN class_schedule ON class_schedule_id = attend_history_class WHERE attend_history_class = '$check' AND attend_history_student = '$id'";
                    $result_check = mysqli_query($conn, $check);
                    while($row3 = mysqli_fetch_array($result_check, MYSQLI_ASSOC)){
                      
                      $idstu = $row3['attend_history_num'];
                      array_push($no, $idstu);
                    }
                      $realstu = "SELECT * FROM detail_subject WHERE subject_id = '$subject' AND chapter_num NOT IN (".implode(',',$no).")";
                      $result_realstu = mysqli_query($conn, $realstu);
                      while($row2 = mysqli_fetch_array($result_realstu, MYSQLI_ASSOC)){?>
                        <option value="<?php echo $row2['chapter_num'];?>"><?php echo "บทที่".$row2['chapter_num']." ".$row2['chapter'];?></option>
                    <?php  
                      }   
                  }
  
                  ?>
</select></td>
            <td>
                <select class="form-control select2 select2-info" name="check[]" data-dropdown-css-class="select2-info" style="width: 100%;">
                  <option selected="selected"></option>
                  <option value="<?php echo $row['attend_class_id'];?>">มา</option>
                  <option value="">ไม่มา</option>
                </select>
          <!-- /.form-group -->
          </td>
          <td><input type="file" class="form-control" id="file"  name="port[]"></td>
          <td><textarea class="form-control" rows="1" placeholder="" name="text"></textarea></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
<div class="card-footer ">
<button type="submit" class="btn btn-outline-success col-lg-12" name="check_st"  >ยืนยัน</button>
</div>
</div>
</form>

</div>
</div>

</body>
</html>s