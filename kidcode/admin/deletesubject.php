<?php
    require('../condb.php');
    if(isset($_REQUEST['del_id'])){
        $id = $_REQUEST['del_id'];
        
        $sql_del1 = ("DELETE FROM teacher_schedule WHERE teacher_schedule_subject = '$id'");
        mysqli_query($conn, $sql_del1);
        
        $select = ("SELECT * FROM class_schedule WHERE class_schedule_subject = '$id'");
        $result = mysqli_query($conn, $select);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $idclass = $row['class_schedule_id'];
            $del_att = ("DELETE FROM attend_class WHERE attend_class_schedule = '$idclass'");
            mysqli_query($conn,$del_att);
            $del_class = ("DELETE FROM class_schedule WHERE class_schedule_subject ='$id'");
            mysqli_query($conn,$del_class);
        }
        $del_subject = "DELETE FROM detail_subject WHERE subject_id = '$id'";
        mysqli_query($conn,$del_subject);
        $update_port = "DELETE FROM portfolio WHERE portfolio_subject = '$id'";
        mysqli_query($conn , $update_port);
        $sql_del1 = ("DELETE FROM subject WHERE subject_id = '$id'");
        mysqli_query($conn, $sql_del1);
        header('location: tableclass.php');
    }


?>