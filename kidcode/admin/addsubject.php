<?php
    require('../condb.php');
    session_start();
    $errors = array();
    if(isset($_POST['add_subjact'])){
        $subjectid = mysqli_real_escape_string($conn, $_POST['idclass']);
        $subjectname = mysqli_real_escape_string($conn, $_POST['nameclass']);
        $subjectcost = mysqli_real_escape_string($conn, $_POST['cost']);
        $subjectallprice = mysqli_real_escape_string($conn, $_POST['allprice']);
        $subjectprice = mysqli_real_escape_string($conn, $_POST['price']);
        $subjecttext = mysqli_real_escape_string($conn, $_POST['text']);

        if(empty($subjectname)){
            array_push($errors, "กรุณาใส่ชื่อวิชา");
            $_SESSION['error'] = "กรุณาใส่ชื่อวิชา";
        }

        if(empty($subjectid)){
            array_push($errors, "กรุณาใส่รหัสวิชา");
            $_SESSION['error'] = "กรุณาใส่รหัสวิชา";
        }
        
        
        $check_subject = ("SELECT * FROM subject WHERE subject_id = '$subjectid'");
        $query = mysqli_query($conn, $check_subject);
        $result = mysqli_fetch_assoc($query);

        if ($result) {      
            if ($result['subject_id'] === $subjectid) {
                array_push($errors, "มีรหัสวิชานี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มีรหัสวิชานี้อยู่ในระบบแล้ว";
            }
        }

        if (count($errors) == 0) {

            
        
            $sql = ("INSERT INTO subject (subject_id, subject_name, subject_detail, subject_amount, subject_number,subject_full_amount) VALUES('$subjectid','$subjectname','$subjecttext','$subjectprice','$subjectcost','$subjectallprice')");
            mysqli_query($conn, $sql);
            for($i = 1 ; $i <= $subjectcost ; $i++){

                $add_detail = "INSERT INTO detail_subject (chapter_num,chapter,subject_id) values('$i','','$subjectid')";
                mysqli_query($conn, $add_detail);
            }
           header('location: tableclass.php');
            
        } else {
            header("location: tableclass.php");
        
        }
    }
    ?>