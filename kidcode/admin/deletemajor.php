<?php 
    session_start();
    require('../condb.php');
    $idad = $_SESSION['id'];

    if(isset($_REQUEST['del'])){
        $id = $_REQUEST['del'];


        $update = "UPDATE branch set branch_show = 'n' WHERE branch_id = '$id'";
        mysqli_query($conn,$update);

        $date_tech = "UPDATE member set member_status = 'ไม่อยู่ในระบบ' WHERE member_branch = '$id'";
        mysqli_query($conn, $date_tech);
       
        header('location: major.php');
    }


?>