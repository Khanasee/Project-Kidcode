<?php 
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['add_stu_class']))
        $id = $_GET['add_id'];
        foreach($_POST['stu'] as $student){

        }

        $sql = ("SELECT * FROM 	teacher_schedule WHERE 	teacher_schedule_id = '$id'");
        $result = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $date = $row['teacher_schedule_date'];
            $subject = $row['teacher_schedule_subject'];
            $major = $row['teacher_schedule_branch'];
        }

        $check = ("SELECT * FROM class_schedule WHERE class_schedule_subject ='$subject' AND class_schedule_student = '$student' AND class_schedule_teacher = '$id' AND class_schedule_branch = '$major'");
        $query = mysqli_query($conn ,$check);
        $result1 = mysqli_fetch_assoc($query);

        if ($result1) {      
            if ($result1['class_schedule_branch'] === $major and $result1['class_schedule_subject'] === $subject and  $result1['class_schedule_student'] === $student and  $result1['class_schedule_teacher'] === $id ) {
                array_push($errors, "มีนักเรียนคนนี้ในตารางแล้ว");
                $_SESSION['error'] = "มีนักเรียนคนนี้ในตารางแล้ว";
            }
        }
        
        if (count($errors) == 0) {
        $insert = ("INSERT INTO class_schedule (class_schedule_branch, class_schedule_subject, class_schedule_student, class_schedule_status, class_schedule_teacher)
                    values ('$major','$subject','$student','ชำระแล้ว','$id')");
        mysqli_query($conn, $insert);

        $sql_check = ("SELECT * FROM class_schedule WHERE class_schedule_branch = '$major' AND class_schedule_subject = '$subject' AND class_schedule_student = '$student' AND class_schedule_teacher = '$id'");
        $result_check = mysqli_query($conn ,$sql_check);
        while($row = mysqli_fetch_array($result_check, MYSQLI_ASSOC)){
            $classid = $row['class_schedule_id'];
        }
        $yaer = date("Y")+543;
        $sdate = date("-m-d");
        $stdate = $yaer.$sdate;

        $insert2 = ("INSERT INTO attend_class (attend_class_date, attend_class_num, attend_class_schedule, attend_class_ci)
                    values ('$date','0','$classid','$stdate')");
        mysqli_query($conn, $insert2);
        header('location: classch.php?add_id='.$id);
    }
    else{
        header('location: classch.php?add_id='.$id);
    }
?>