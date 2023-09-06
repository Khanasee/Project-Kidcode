<?php
    session_start();
    require('../condb.php');
    $errors = array();

    if (isset($_POST['update_student'])) {
            $id = $_GET['edit'];
            $user =  mysqli_real_escape_string($conn,$_POST['user']);
            $surname = mysqli_real_escape_string($conn,$_POST['surname']);
            $nickname = mysqli_real_escape_string($conn,$_POST['nickname']);
            $prsurname = mysqli_real_escape_string($conn,$_POST['parentsurname']);
            $line = mysqli_real_escape_string($conn,$_POST['line']);
            $face = mysqli_real_escape_string($conn,$_POST['face']);
            $tel = mysqli_real_escape_string($conn,$_POST['tel']);
            $emil = mysqli_real_escape_string($conn,$_POST['email']);
            foreach($_POST['major'] as $major){

            }
            $sel_major = "SELECT * FROM branch WHERE branch_name = '$major'";
            $result_major = mysqli_query($conn, $sel_major);
            while($row = mysqli_fetch_array($result_major, MYSQLI_ASSOC)){
                $major = $row['branch_id'];
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
        
        
        $sql = "UPDATE student SET student_user='$user' ,student_fullname = '$surname' ,student_nic = '$nickname', student_parents = '$prsurname' , student_line = '$line', student_facebook = '$face' ,student_tel = '$tel' , student_email = '$emil', student_branch = '$major' , student_photo = '$photo' WHERE student_id = '$id'";
        $result = mysqli_query($conn,$sql);

        
        if($result){
             header("location:detailstudent.php");
             exit(0);
        }else{
            echo "เกิดข้อผิดพลาด".mysqli_error($conn);
        }
}
?>
   
    




    /*session_start();
    require('condb.php');
    $errors = array();

    $id = $_POST["id"];
    $user = $_POST["user"];
    $password = $_POST["password"];
    $surname = $_POST["surname"];
    $lastname = $_POST["lastname"];
    $date = $_POST["date"];
    $image = $_POST["image"];
    $prsurname = $_POST["parentsurname"];
    $prlastname = $_POST["parentlastname"];
    $line = $_POST["line"];
    $face = $_POST["face"];
    $tel = $_POST["tel"];
    $emil = $_POST["email"];
    $member = $_POST["member"];
    $major = $_POST["major"];

    $sql = "UPDATE student SET username='$user',password='$password',fname='$surname',lname='$lastname',bdate='$date',photo='image',
    fparent = '$prsurname' , lparent = '$prlastname', lineid ='$line',faceid = '$face', telid = '$tel' , email = '$emil',usernamemem = '$member'
    ,majorid = '$major'  WHERE id = '$id'";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:detailstudent.php");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาด".mysqqli_error($conn);
    }
*/


