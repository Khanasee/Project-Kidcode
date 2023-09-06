<?php
    session_start();
    require('condb.php');
    $errors = array();

    if(isset($_POST['login_mem'])){
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
    

    
        $pass = md5($pass);
        $query = "SELECT * FROM member WHERE member_user = '$user' AND member_password = '$pass' ";
        $result = mysqli_query($conn, $query);

  
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $major = $row['member_branch'];
            $photo = $row['member_photo'];
            $fullname = $row['member_fullname'];
            $id = $row['member_id'];
            $rank = $row['member_rank'];
        }
    if (mysqli_num_rows($result) == 1) {    
    if($rank == 'a'){
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
            $_SESSION['username'] = $user;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['branch'] = $major;
            $_SESSION['photo'] = $photo;
            $_SESSION['id'] = $id;
            $_SESSION['success'] = "Your are now logged in";
            header("location: admin/index.php");
        } else {
            array_push($errors, "Wrong Username or Password");
            $_SESSION['error'] = "Wrong Username or Password!";
            header("location: index.php");
        }
    }
    if($rank == 's'){
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
            $_SESSION['sub_username'] = $user;
            $_SESSION['sub_fullname'] = $fullname;
            $_SESSION['sub_photo'] = $photo;
            $_SESSION['sub_id'] = $id;
            $_SESSION['success'] = "Your are now logged in";
            header("location: subadmin/indexjk.php");
        } else {
            array_push($errors, "Wrong Username or Password");
            $_SESSION['error'] = "Wrong Username or Password!";
            header("location: index.php");
        }
    }
    if($rank == 't'){
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
            $_SESSION['tech_username'] = $user;
            $_SESSION['tech_fullname'] = $fullname;
            $_SESSION['tech_branch'] = $major;
            $_SESSION['tech_photo'] = $photo;
            $_SESSION['tech_id'] = $id;
            $_SESSION['success'] = "Your are now logged in";
            header("location: techer/indextech.php");
        } else {
            array_push($errors, "Wrong Username or Password");
            $_SESSION['error'] = "Wrong Username or Password!";
            header("location: index.php");
        }
     }
    }else  {
 
        array_push($errors, "<script>alert('Username and Password Incorrect!');</script>");
        $_SESSION['error'] = "<script>alert('Username and Password Incorrect!');</script>";
        header("location: index.php");
    }

    } 


?>