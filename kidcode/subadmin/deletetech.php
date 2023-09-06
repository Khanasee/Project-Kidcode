<?php 
    session_start();
    $member = $_SESSION['sub_id'];
    require('../condb.php');
    if(isset($_REQUEST['del_id'])){
        $id = $_REQUEST['del_id'];      
        $select_branch = ("SELECT * FROM member WHERE member_id = '$id'");
        $result_select = mysqli_query($conn, $select_branch);
        while($row = mysqli_fetch_array($result_select, MYSQLI_ASSOC)){
            $branch = $row['member_branch'];
        }

        $del_tech = ("DELETE FROM tech WHERE tech='$id'");
        mysqli_query($conn, $del_tech);
        
        $sql_update1 = ("UPDATE teacher_schedule set teacher_schedule_name  = '$member' WHERE teacher_schedule_name  = '$id'");
        mysqli_query($conn, $sql_update1);

        $sql_update2 = ("UPDATE student set credit_by = '$member' WHERE credit_by = '$id'");
        mysqli_query($conn, $sql_update2 );

        $sql_del1 = ("DELETE FROM member WHERE member_id = '$id'");
        mysqli_query($conn, $sql_del1);
       
        header('location: tech.php');
    }




?>