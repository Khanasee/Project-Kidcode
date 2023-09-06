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

$check = ("SELECT * FROM branch WHERE branch_name ='$q'");
$result_check = mysqli_query($conn, $check);
while($row = mysqli_fetch_array($result_check, MYSQLI_ASSOC)){
    $majorid = $row['branch_id'];
}
?>
    <div class="form-group">
    <label for="exampleSelectBorder">อาจารย์ผู้สอน</label>
    <select class="custom-select form-control-border" id="exampleSelectBorder" name="tech[]" ><?php
    $check2 = "SELECT * FROM tech WHERE major = '$majorid'";
    $result_check2 = mysqli_query($conn,$check2);
    while($row = mysqli_fetch_array($result_check2,MYSQLI_ASSOC)){
    $realid = $row['tech'];
    $sql="SELECT * FROM member WHERE member_id = '$realid'";
    $result = mysqli_query($conn,$sql);
        
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
    <option><?php echo $row['member_fullname'];?></option>
    <?PHP } 
   
    
}?>
</select>
    </div>

<?php
mysqli_close($conn);
?>
</body>
</html>