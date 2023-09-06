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
            $sql = ("SELECT * FROM student WHERE student_id = '$id'");
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $email = $row['student_email'];
            }

        }

        if($_FILES["image"]["name"] == ""){
            $sql = ("SELECT student_photo FROM student WHERE student_id = '$id'");
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $photo = $row['student_photo'];
            }
        }  
                
        if($_FILES["image"]["name"] != ""){      
                $dir = "../upload/";
                $photo = $dir . basename($_FILES["image"]["name"]);
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $photo)){  
                        
                }
        }

        $sql = ("UPDATE student set student_fullname = '$fullname' , student_line = '$line', student_facebook = '$facebook', student_tel = '$tel', student_email = '$email', student_photo = '$photo' WHERE student_id = '$id'");
        mysqli_query($conn, $sql);
        $_SESSION['stu_photo'] = $photo;
        $_SESSION['stu_fullname'] = $fullname;
        header('location: indexstu.php');
    }
    



?>