<?php
    session_start();
    require('../condb.php');
    $errors = array();


    if(isset($_POST['add_student'])){
    $surname = mysqli_real_escape_string($conn,$_POST['surname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $nickname = mysqli_real_escape_string($conn,$_POST['nickname']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);
    $prsurname = mysqli_real_escape_string($conn,$_POST['parentsurname']);
    $prlastname = mysqli_real_escape_string($conn,$_POST['parentlastname']);
    $line = mysqli_real_escape_string($conn,$_POST['line']);
    $face = mysqli_real_escape_string($conn,$_POST['face']);
    $tel = mysqli_real_escape_string($conn,$_POST['tel']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    foreach($_POST['major'] as $major){
            
    }
    

    
    if (empty($surname)){
        array_push($errors, "กรุณาใส่ชื่อ");
        $_SESSION['error'] = "กรุณาใส่ชื่อ";
    }
    if (empty($lastname)){
        array_push($errors, "กรุณาใส่นามสกุล");
        $_SESSION['error'] = "กรุณาใส่นามสกุล";
    }
    if (empty($nickname)){
        array_push($errors, "กรุณาใส่ชื่อเล่น");
        $_SESSION['error'] = "กรุณาใส่ชื่อเล่น";
    }
    if (empty($prsurname)){
        array_push($errors, "กรุณาใส่ชื่อใส่ชื่อผู้ปกครอง");
        $_SESSION['error'] = "กรุณาใส่ชื่อผู้ปกครอง";
    }
    if (empty($prlastname)){
        array_push($errors, "กรุณาใส่นามสกุล");
        $_SESSION['error'] = "กรุณาใส่นามสกุล";
    }
    if (empty($tel)){
        array_push($errors, "กรุณาใส่เบอร์โทรศัพท์");
        $_SESSION['error'] = "กรุณาใส่เบอร์โทรศัพท์";
    }

    $student_check_query = "SELECT * FROM student WHERE student_user = '$email'";
    $query = mysqli_query($conn, $student_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {      
        if ($result['student_user'] === $email) {
            array_push($errors, "มี User นี้อยู่ในระบบแล้ว");
            $_SESSION['error'] = "มี User นี้อยู่ในระบบแล้ว";
        }
    }

    if (count($errors) == 0) {
        $password = md5($tel);
        $dir = "../upload/";
        $fileimage = $dir . basename($_FILES["image"]["name"]);

        if(move_uploaded_file($_FILES["image"]["tmp_name"], $fileimage)){
        }
      
        $fullname = $surname." ".$lastname;
        $prfullname = $prsurname." ".$prlastname;
        $yaer = date("Y")+543;
        $sdate = date("-m-d");
        $stdate = $yaer.$sdate;


        $sql_major = ("SELECT * FROM branch WHERE branch_name = '$major'");
        $result_major = mysqli_query($conn, $sql_major);
        while($row = mysqli_fetch_array($result_major, MYSQLI_ASSOC)){
            $major = $row['branch_id'];
        }

        $member = $_SESSION['tech_id'];

        $sql = ("INSERT INTO student(student_user, student_password, student_photo, student_fullname, student_nic, student_birth, student_branch, student_parents, student_status, student_line, student_facebook, student_tel, student_email, credit_by, credit_date)
                values ('$email','$password','$fileimage','$fullname','$nickname','$date','$major','$prfullname','เรียนอยู่','$line','$face','$tel','$email','$member','$stdate')");
                mysqli_query($conn, $sql);

        
        header('location: detailstudent.php');
    } else {
        echo mysqli_error($conn);
        header('location: addstudent.php');
    }

    }
?>
 