<?php 
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['edit_sub'])){
        $id = $_GET['edit'];
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $line = mysqli_real_escape_string($conn, $_POST['line']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        if($email == ''){
            $sql = ("SELECT * FROM member WHERE member_id = '$id'");
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $email = $row['member_email'];
            }
        }

        $member_check = "SELECT * FROM member WHERE member_user = '$user'";
        $query = mysqli_query($conn, $member_check);
        $result = mysqli_fetch_assoc($query);

        if ($result) {      
            if ($result['member_user'] == $user AND $result['member_id'] != $id) {
                array_push($errors, "มี User นี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มี User นี้อยู่ในระบบแล้ว";
            }
        }

        if(count($errors) == 0) {
            $sql = ("UPDATE member set member_user = '$user', member_fullname = '$fullname', member_nickname = '$nickname', member_tel = '$tel', member_line = '$line', member_facebook = '$facebook', member_email = '$email' WHERE member_id = '$id'");
            mysqli_query($conn, $sql);
            header('location: subadmin.php');
        }
        else{
            header('location: subadmin.php');
        }
    }
?>