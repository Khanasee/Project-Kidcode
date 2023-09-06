<?php 
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['edit_tc'])){
        $id = $_GET['edit'];
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $line = mysqli_real_escape_string($conn, $_POST['line']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        foreach($_POST['major'] as $major){

        }

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
            if ($result['member_user'] == $user AND $result['member_id'] != $id && $result['member_status'] == 'อยู่ในระบบ') {
                array_push($errors, "มี User นี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มี User นี้อยู่ในระบบแล้ว";
            }
        }


       

        if(count($errors) == 0) {

            if(empty($major)){
            $sql = ("UPDATE member set member_user = '$user', member_fullname = '$fullname', member_nickname = '$nickname', member_tel = '$tel', member_line = '$line', member_facebook = '$facebook', member_email = '$email'WHERE member_id = '$id'");
            mysqli_query($conn, $sql);
            header('location: techdetail.php');
            }
            if(!empty($major)){
                $update = "UPDATE member set member_status = 'ไม่อยู่ในระบบ' WHERE member_id = '$id'";
                mysqli_query($conn,$update);
                $sel_new = "SELECT * FROM member WHERE member_id = '$id'";
                $result_new = mysqli_query($conn, $sel_new);
                while($row = mysqli_fetch_array($result_new, MYSQLI_ASSOC)){
                  
                    $member_password = $row['member_password'];
                    $member_photo = $row['member_photo'];
                    
                    $member_id_card_code = $row['member_id_card_code'];
                    
                    $member_stdate = $row['member_stdate'];
                    $member_county = $row['member_county'];
                    $member_birth = $row['member_birth'];
                    $member_rank = $row['member_rank'];
                }
                $insert_new = "INSERT INTO member (member_user, member_password, member_photo, member_fullname, member_nickname, member_id_card_code, member_tel, member_email, member_facebook, member_line, member_stdate, member_branch, member_county, member_birth, member_rank, member_status)
                                VALUES ('$user','$member_password','$member_photo','$fullname','$nickname','$member_id_card_code','$tel','$email','$facebook','$line','$member_stdate','$major','$member_county','$member_birth','t','อยู่ในระบบ')";
                
                
                                mysqli_query($conn, $insert_new);
                                header('location: techdetail.php');
            }
        }
        else{
            header('location: techdetail.php');
        }
    }
?>