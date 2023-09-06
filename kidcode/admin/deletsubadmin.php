<?php
    session_start();
    require('../condb.php');

    if(isset($_REQUEST['del_id'])){
        $id = $_REQUEST['del_id'];
        $adminid = $_SESSION['id'];  

      

        $update = "UPDATE member SET member_status = 'ไม่อยู่ในระบบ' WHERE member_id = '$id'";
        mysqli_query($conn, $update);
       
        header('location: subadmin.php');
    
    }

?>