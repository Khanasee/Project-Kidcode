<?php 
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['add_class'])){
        foreach($_POST['subject'] as $subject){
            
        }
        foreach($_POST['major'] as $major){
            
        }
        foreach($_POST['tech'] as $tech){
            
        }
        foreach($_POST['day'] as $day){
            
        }
        foreach($_POST['sttime'] as $sttime){
            
        }
        foreach($_POST['endtime'] as $endtime){
            
        }

        if(empty($sttime)){
            array_push($errors, "กรุณาระบุเวลาเริ่ม");
            $_SESSION['error'] = "กรุณาระบุเวลาเริ่ม";
        }

        if(empty($endtime)){
            array_push($errors, "กรุณาระบุเวลาจบ");
            $_SESSION['error'] = "กรุณาระบุเวลาจบ";
        }

        $check_subject = ("SELECT * FROM subject WHERE subject_name = '$subject'");
        $result_subject = mysqli_query($conn , $check_subject);
        while($row = mysqli_fetch_array($result_subject, MYSQLI_ASSOC)){
            $subject = $row['subject_id'];
        }
        
        $check_member = ("SELECT * FROM member WHERE member_fullname = '$tech'");
        $result_member = mysqli_query($conn, $check_member);
        while($row = mysqli_fetch_array($result_member, MYSQLI_ASSOC)){
            $tech = $row['member_id'];
        }
    
        $check_major = ("SELECT * FROM branch WHERE branch_name = '$major'");
        $result_major = mysqli_query($conn, $check_major);
        while($row = mysqli_fetch_array($result_major, MYSQLI_ASSOC)){
            $major = $row['branch_id'];
        }
    
        $sql = ("SELECT * FROM teacher_schedule WHERE teacher_schedule_subject = '$subject' AND teacher_schedule_name ='$tech' AND teacher_schedule_branch = '$major' AND teacher_schedule_date = '$day' AND teacher_schedule_starttime = '$sttime' AND teacher_schedule_endtime = '$endtime'");
        $query = mysqli_query($conn , $sql);
        $result = mysqli_fetch_assoc($query);

        if ($result) {      
            if ($result['teacher_schedule_subject'] === $subject && $result['teacher_schedule_name'] === $tech && $result['teacher_schedule_branch'] === $major && $result['teacher_schedule_date'] === $day && $result['teacher_schedule_starttime'] === $sttime && $result['teacher_schedule_endtime'] === $endtime) {
                array_push($errors, "มีตารางวิชานี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มีตารางวิชานี้อยู่ในระบบแล้ว";
            }
        }
        if (count($errors) == 0) {
        $add = ("INSERT INTO teacher_schedule (teacher_schedule_subject, teacher_schedule_name, teacher_schedule_branch, teacher_schedule_date, teacher_schedule_starttime, teacher_schedule_endtime) VALUES('$subject','$tech','$major','$day','$sttime','$endtime')");
        mysqli_query($conn, $add);
        header('location: learn.php');
        } else {
        header("location: learn.php");
        }

        
    }



?>