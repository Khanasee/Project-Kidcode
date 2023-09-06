<?php 
    require('../condb.php');
    if(isset($_REQUEST['del_id'])){
        $id = $_REQUEST['del_id'];      
        $update = "UPDATE member set member_status = 'ไม่อยู่ในระบบ' WHERE member_id = '$id'";
        mysqli_query($conn, $update);
       
        header('location: techdetail.php');
    }




?>