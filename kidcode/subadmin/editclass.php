<?php 
    require('../condb.php');

    if(isset($_POST['edit_class'])){
        $id = $_GET['edit_id'];
        foreach($_POST['major'] as $major){

        }
        foreach($_POST['member'] as $member){
            
        }
        foreach($_POST['sttime'] as $sttime){
            
        }
        foreach($_POST['endtime'] as $endtime){
            
        }
        $sql = ("SELECT * FROM branch WHERE branch_name = '$major'");
        $result = mysqli_query($conn ,$sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $major = $row['branch_id'];
        }
        $sql = ("SELECT * FROM member WHERE member_fullname = '$member'");
        $result = mysqli_query($conn ,$sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $member = $row['member_id'];
        }

        $sql = ("UPDATE teacher_schedule set teacher_schedule_name = '$member', teacher_schedule_branch = '$major', teacher_schedule_starttime = '$sttime', teacher_schedule_endtime = '$endtime' WHERE 	teacher_schedule_id = '$id' ");
        mysqli_query($conn, $sql);
        header('location: learn.php');

    }
?>