<?php
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['add_major'])){
        $idmajor = mysqli_real_escape_string($conn, $_POST['idmajor']);
        $major = mysqli_real_escape_string($conn, $_POST['major']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $map = mysqli_real_escape_string($conn, $_POST['map']);
        foreach($_POST['province'] as $province){

        }

        
        if(empty($idmajor)){
            array_push($errors, "กรุณาใส่รหัสสาขา");
            $_SESSION['error'] = "กรุณาใส่รหัสสาขา";
        }
      
        if(empty($major)){
            array_push($errors, "กรุณาใส่ชื่อสาขา");
            $_SESSION['error'] = "กรุณาใส่ชื่อสาขา";
        }
     
        if(empty($address)){
            array_push($errors, "กรุณาใส่ที่อยู่");
            $_SESSION['error'] = "กรุณาใส่ที่อยู่";
        }

        if(empty($province)){
            array_push($errors, "กรุณาเลือกจังหวัด");
            $_SESSION['error'] = "กรุณาเลือกจังหวัด";
        }

        if(empty($idmajor) && empty($major) && empty($address)){
            array_push($errors, "กรุณากรอกข้อมูล");
            $_SESSION['error'] = "กรุณากรอกข้อมูล";
        }
        $s = "s";
        $major_check = "SELECT * FROM branch WHERE branch_id = '$idmajor' AND branch_show = '$s'";
        $query = mysqli_query($conn, $major_check);
        $result = mysqli_fetch_assoc($query);

        if ($result) {      
            if ($result['branch_id'] === $idmajor AND $result['branch_show'] === $s) {
                array_push($errors, "มีรหัสสาขานี้อยู่ในระบบแล้ว");
                $_SESSION['error'] = "มีรหัสสาขานี้อยู่ในระบบแล้ว";
            }
        }

        if (count($errors) == 0) {

            if($_FILES["image"]["name"] == ""){
            
            $fileimage = "../upload/no_image.png";
            $sql = "INSERT INTO branch (branch_id, branch_name, branch_address, branch_map, branch_photo, branch_county, branch_show) VALUES ('$idmajor', '$major', '$address', '$map', '$fileimage','$province','s' )";
            mysqli_query($conn, $sql);
            header('location: major.php');
            }

            if($_FILES["image"]["name"] != ""){
            $dir = "../upload/";
            $fileimage = $dir . basename($_FILES["image"]["name"]);

            if(move_uploaded_file($_FILES["image"]["tmp_name"], $fileimage)){
                
            }

            $sql = "INSERT INTO branch (branch_id, branch_name, branch_address, branch_map, branch_photo, branch_county, branch_show) VALUES ('$idmajor', '$major', '$address', '$map', '$fileimage','$province','s' )";
            mysqli_query($conn, $sql);
            header('location: major.php');
        }
        } else {
            header('location: major.php');
        }
    }



    