<?php
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['add_sub'])){
        $username = mysqli_real_escape_string($conn, $_POST['usernamejk']);
        $password = mysqli_real_escape_string($conn, $_POST['passwordjk']);
        $password2 = mysqli_real_escape_string($conn, $_POST['passwordjk2']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
        $idcard = mysqli_real_escape_string($conn, $_POST['idcard']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $line = mysqli_real_escape_string($conn, $_POST['line']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        foreach($_POST['province'] as $province){

        }

      
        if($password != $password2){
            array_push($errors, "รหัสผ่านไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        }

        $member_check = "SELECT * FROM member WHERE member_user = '$username' AND member_status = 'อยู่ในระบบ'";
        $query = mysqli_query($conn, $member_check);
        $result = mysqli_fetch_assoc($query);

        
        if ($result) { // if user exists
            if ($result['member_user'] === $username && $result['member_status'] === 'อยู่ในระบบ') {
                array_push($errors, "มีUsernameนี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มีUsernameนี้อยู่ในระบบแล้ว";
            }
        }

        if (count($errors) == 0) {
            if($_FILES["image"]["name"] == ""){
            
                $fileimage = "../upload/no_image.png";
                $fullname = $name." ".$lastname;
                $yaer = date("Y")+543;
                $sdate = date("-m-d");
                $stdate = $yaer.$sdate;
    
                $password1 = md5($password);
    
                $sql = "INSERT INTO member (member_user, member_password, member_photo, member_fullname, member_id_card_code, member_tel, member_facebook, member_line, member_stdate, member_birth, member_rank, member_status ,member_email,member_county,member_nickname) 
                        VALUES ('$username','$password1','$fileimage','$fullname','$idcard','$tel','$facebook','$line','$stdate','$date','s','อยู่ในระบบ','$email','$province','$nickname')";
                mysqli_query($conn, $sql);
                header('location: subadmin.php');
                }

                if($_FILES["image"]["name"] != ""){
            $dir = "../upload/";
            $fileimage = $dir . basename($_FILES["image"]["name"]);

            if(move_uploaded_file($_FILES["image"]["tmp_name"], $fileimage)){
                
            }
            $fullname = $name." ".$lastname;
            $yaer = date("Y")+543;
            $sdate = date("-m-d");
            $stdate = $yaer.$sdate;

            $password1 = md5($password);

            $sql = "INSERT INTO member (member_user, member_password, member_photo, member_fullname, member_id_card_code, member_tel, member_facebook, member_line, member_stdate, member_birth, member_rank, member_status ,member_email,member_county,member_nickname) 
                    VALUES ('$username','$password1','$fileimage','$fullname','$idcard','$tel','$facebook','$line','$stdate','$date','s','อยู่ในระบบ','$email','$province','$nickname')";
            mysqli_query($conn, $sql);
            header('location: subadmin.php');
        }
        } else {
            header("location: subadmin.php");
        }
    }

    
?>