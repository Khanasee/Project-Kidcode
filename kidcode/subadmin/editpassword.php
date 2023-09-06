<?php
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['edit_pass'])){
        $id = $_GET['edit'];
        $pass1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $pass2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $pass3 = mysqli_real_escape_string($conn, $_POST['password_3']);

        if($pass1 != $pass2){
            array_push($errors, "รหัสผ่านไม่เหมือนกัน");
            $_SESSION['error'] = "รหัสผ่านไม่เหมือนกัน";
        }
    
        $sql = ("SELECT member_password FROM member WHERE member_id = '$id'");
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $pass3 = md5($pass3);

        if ($result) {      
            if ($result['member_password'] != $pass3) {
                array_push($errors, "รหัสไม่ถูกต้อง");
                $_SESSION['error'] = "รหัสไม่ถูกต้อง";
            }
        }

        if (count($errors) == 0) {
            $pass = md5($pass1);
            $sql = "UPDATE member set member_password = '$pass' WHERE member_id = '$id'";
            $_SESSION['success'] = "เปลี่ยนรหัสเรียบร้อย";
            mysqli_query($conn, $sql);
            header('location: edit.php');
            
        } else {
            header('location: edit.php');
        }

    
       
    }
    ?>