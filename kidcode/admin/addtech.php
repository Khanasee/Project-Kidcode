<?php
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['add_tech'])){
        $username = mysqli_real_escape_string($conn, $_POST['usernametech']);
        $password = mysqli_real_escape_string($conn, $_POST['passwordtech']);
        $password2 = mysqli_real_escape_string($conn, $_POST['passwordtech2']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
        $idcard = mysqli_real_escape_string($conn, $_POST['idcard']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $line = mysqli_real_escape_string($conn, $_POST['line']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        foreach($_POST['tech'] as $tech){
            $realtech = $tech;
        }
        foreach($_POST['province'] as $province){

        }


        if($password != $password2){
            array_push($errors, "รหัสผ่านไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        }
        

        $member_check = "SELECT * FROM member WHERE member_id_card_code = '$idcard' or member_user = '$username'";
        $query = mysqli_query($conn, $member_check);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['member_id_card_code'] === $idcard) {
                array_push($errors, "มีรหัสบัตรประชนนี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มีรหัสบัตรประชนนี้อยู่ในระบบแล้ว";
            }
        }
        if ($result) { // if user exists
            if ($result['member_user'] === $username) {
                array_push($errors, "มีUsernameนี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มีUsernameนี้อยู่ในระบบแล้ว";
            }
        }

        if (count($errors) == 0) {

            if($_FILES["image"]["name"] == ""){
            
                $fileimage = "../upload/no_image.png";
                $show = ("SELECT * FROM branch WHERE branch_name = '$realtech'");
                $result2 = mysqli_query($conn, $show);
                while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                    $major = $row['branch_id'];
                }
                $fullname = $name." ".$lastname;
                $yaer = date("Y")+543;
                $sdate = date("-d-m");
                $stdate = $yaer.$sdate;

                $password1 = md5($password);

                $sql = "INSERT INTO member (member_user, member_password, member_photo, member_fullname,member_nickname, member_id_card_code, member_tel, member_facebook, member_line, member_stdate, member_birth, member_rank, member_status ,member_email, member_branch,member_county) 
                        VALUES ('$username','$password1','$fileimage','$fullname','$nickname','$idcard','$tel','$facebook','$line','$stdate','$date','t','อยู่ในระบบ','$email','$major','$province')";
                mysqli_query($conn, $sql);

                $sql_add = "SELECT * FROM member WHERE member_user = '$username' AND member_password = '$password1' AND member_rank = 't'";
                $result_add = mysqli_query($conn,$sql_add);
                while($row2 = mysqli_fetch_array($result_add,MYSQLI_ASSOC)){
                    $member_id = $row2['member_id'];
                }
                $sql2 = "INSERT INTO tech (tech,major) VALUES('$member_id','$major')";
                mysqli_query($conn,$sql2);
                header('location: techdetail.php');


            }
            if($_FILES["image"]["name"] != ""){
            $dir = "../upload/";
            $fileimage = $dir . basename($_FILES["image"]["name"]);

            if(move_uploaded_file($_FILES["image"]["tmp_name"], $fileimage)){
                
            }
            $show = ("SELECT * FROM branch WHERE branch_name = '$realtech'");
            $result2 = mysqli_query($conn, $show);
            while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                $major = $row['branch_id'];
            }
            $fullname = $name." ".$lastname;
            $yaer = date("Y")+543;
            $sdate = date("-d-m");
            $stdate = $yaer.$sdate;

            $password1 = md5($password);

            $sql = "INSERT INTO member (member_user, member_password, member_photo, member_fullname,member_nickname, member_id_card_code, member_tel, member_facebook, member_line, member_stdate, member_birth, member_rank, member_status ,member_email, member_branch,member_county) 
                    VALUES ('$username','$password1','$fileimage','$fullname','$nickname','$idcard','$tel','$facebook','$line','$stdate','$date','t','อยู่ในระบบ','$email','$major','$province')";
            mysqli_query($conn, $sql);

            $sql_add = "SELECT * FROM member WHERE member_user = '$username' AND member_password = '$password1' AND member_rank = 't'";
            $result_add = mysqli_query($conn,$sql_add);
            while($row2 = mysqli_fetch_array($result_add,MYSQLI_ASSOC)){
                $member_id = $row2['member_id'];
            }
            $sql2 = "INSERT INTO tech (tech,major) VALUES('$member_id','$major')";
            mysqli_query($conn,$sql2);
            header('location: techdetail.php');
        }
        } else {
            header("location: techdetail.php");
        }
    }

    
?>