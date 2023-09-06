<?php  
    require('../condb.php');

    if(isset($_REQUEST['del_id'])){
        $id = $_REQUEST['del_id'];

        $sele = ("SELECT * FROM class_schedule WHERE class_schedule_id = '$id'");
        $result = mysqli_query($conn, $sele);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $idclass =  $row['class_schedule_teacher'];
        }

        $del_att = ("DELETE FROM attend_class WHERE attend_class_schedule = '$id'");
        mysqli_query($conn , $del_att);
        
        $del_class = ("DELETE FROM class_schedule WHERE class_schedule_id = '$id'");
        mysqli_query($conn , $del_class);
        header('location: classch.php?add_id='.$idclass);
    }



?>