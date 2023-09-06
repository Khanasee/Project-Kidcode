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
require('../condb.php');
$q = ($_GET['q']);


?>
    <div class="form-group">
    <label for="exampleSelectBorder">อาจารย์ผู้สอน</label>
    <select class="custom-select form-control-border" id="exampleSelectBorder" name="tech[]" >
    <?php
    $check = "SELECT * FROM tech WHERE major = '$q'";
    $result_check = mysqli_query($conn, $check);
    while($row = mysqli_fetch_array($result_check, MYSQLI_ASSOC)){
      $id = $row['tech'];
      $sql="SELECT * FROM member WHERE member_id = '$id'";
      $result = mysqli_query($conn,$sql);
          
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
      <option><?php echo $row['member_fullname'];?></option>
      <?PHP } 
   
    }
?>
</select>
    </div>

<?php
mysqli_close($conn);
?>
</body>
</html>