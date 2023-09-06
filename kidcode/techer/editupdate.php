<?php 
    session_start();
    require('../condb.php');
    

    if(isset($_POST['edit_update'])){
        $id = $_GET['edit'];
        $fullname = mysqli_real_escape_string($conn, $_POST['name']);
        $line = mysqli_real_escape_string($conn, $_POST['line']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        if($email == ''){
            $sql = ("SELECT * FROM member WHERE member_id = '$id'");
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $email = $row['member_email'];
            }

        }

        if($_FILES["image"]["name"] == ""){
            $sql = ("SELECT member_photo FROM member WHERE member_id = '$id'");
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $photo = $row['member_photo'];
            }
        }  
                
        if($_FILES["image"]["name"] != ""){      
                $dir = "../upload/";
                $photo = $dir . basename($_FILES["image"]["name"]);
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $photo)){  
                        
                }
        }

        $sql = ("UPDATE member set member_fullname = '$fullname' , member_line = '$line', member_facebook = '$facebook', member_tel = '$tel', member_email = '$email', member_photo = '$photo' WHERE member_id = '$id'");
        mysqli_query($conn, $sql);
        $_SESSION['tech_photo'] = $photo;
        $_SESSION['tech_fullname'] = $fullname;
        header('location: indextech.php');
    }
    



?>