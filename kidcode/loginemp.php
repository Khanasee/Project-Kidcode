<?php
   session_start();
   include('condb.php');

   $errors = array();

   if (isset($_POST['login_emp'])) {
       $username = mysqli_real_escape_string($conn, $_POST['idemp']);
       $password = mysqli_real_escape_string($conn, $_POST['passemp']);

       $password = md5($password);

       $sql1 = ("SELECT * FROM student WHERE student_user =  '$username' AND student_password = '$password'");
       $query1 = mysqli_query($conn ,$sql1);
       $result1 = mysqli_fetch_assoc($query1);

       if ($result1) {      
        if ($result1['student_user'] != $username && $result1['student_password'] != $password) {
            array_push($errors, "ไม่มีบัญชีนี้อยู่ในระบบ");
            $_SESSION['error'] = "ไม่มีบัญชีนี้อยู่ในระบบ";
        }
        else if ($result1['student_user'] === $username && $result1['student_password'] != $password || $result1['student_user'] != $username && $result1['student_password'] === $password) {
            array_push($errors, "Username หรือ Password ไม่ถูกต้อง");
            $_SESSION['error'] = "Username หรือ Password ไม่ถูกต้อง";
        }
        
    }

       if (count($errors) == 0) {
           $query = "SELECT * FROM student WHERE student_user = '$username' AND student_password = '$password' ";
           $result = mysqli_query($conn, $query);
           while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
               $id = $row['student_id'];
               $name = $row['student_fullname'];
               $major = $row['student_branch'];
           }

           if (mysqli_num_rows($result) == 1) {
            if (!empty($_POST['remember'])) {
                setcookie('user_login', $_POST['username'], time() + (10 * 365 * 24 * 60 * 60));
                setcookie('user_password', $_POST['password'], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if (isset($_COOKIE['user_login'])) {
                    setcookie('user_login', '');

                    if (isset($_COOKIE['user_password'])) {
                        setcookie('user_password', '');
                    }
                }
            }
               $_SESSION['stu_username'] = $username;
               $_SESSION['stu_id'] = $id;
               $_SESSION['stu_name'] = $name;
               $_SESSION['stu_major'] = $major;
               $_SESSION['success'] = "Your are now logged in";
               header('location: member/indexstu.php');
           } else {
            array_push($errors, "<script>alert('Username and Password Incorrect!');</script>");
            $_SESSION['error'] = "<script>alert('Username and Password Incorrect!');</script>";
            header("location: index.php");
           }
       } else {
        array_push($errors, "<script>alert('Username and Password Incorrect!');</script>");
        $_SESSION['error'] = "<script>alert('Username and Password Incorrect!');</script>";
        header("location: index.php");
       }
   }
?>