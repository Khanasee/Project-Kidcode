<?php 
    require('../condb.php');
    if(isset($_REQUEST['del_id'])){
        $id = $_REQUEST['del_id'];

        $sel_class = "SELECT * FROM class_schedule WHERE class_schedule_teacher = '$id'";
        $result_class = mysqli_query($conn, $sel_class);
        while($row = mysqli_fetch_array($result_class, MYSQLI_ASSOC)){
            $classid = $row['class_schedule_id'];
            $del_att = "DELETE FROM attend_class WHERE attend_class_schedule = '$classid'";
            mysqli_query($conn, $del_att);
            $del_att_his = "DELETE FROM attend_history WHERE attend_history_class = '$classid'";
            mysqli_query($conn, $del_att_his);
        }

        $del_class = "DELETE FROM class_schedule WHERE class_schedule_teacher = '$id'";
        mysqli_query($conn, $del_class);
        
        $sql = ("DELETE FROM teacher_schedule WHERE teacher_schedule_id = '$id'");
        mysqli_query($conn, $sql);
        header('location: learn.php');
    }


?>