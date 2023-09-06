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


$id = $_SESSION['sub_id'];
?>
    <div class="form-group">
    <label for="">ตารางสอน</label>
                  <select class="form-control select2" style="width: 100%;" name="schedule[]" onchange="showUser2(this.value)">
                  <option selected="selected">เลือกวิชา</option>
                    <?php $sql2 = "SELECT * FROM teacher_schedule WHERE teacher_schedule_subject = '$q' AND teacher_schedule_name = '$id'";
                          $result = mysqli_query($conn, $sql2);
                          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                    <option value="<?php echo $row['teacher_schedule_id']; ?>"><?php echo "วัน".$row['teacher_schedule_date']." เวลา ".$row['teacher_schedule_starttime']." ถึง ".$row['teacher_schedule_endtime'];?></option>
                    <?php }?>
                  </select>
                  
    </div>

<?php
mysqli_close($conn);
?>


</body>
</html>