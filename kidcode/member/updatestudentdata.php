<?php
    require("condb.php");

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
    ,majorid = '$major'  WHERE id = '$id'
    ";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:detailstudent.php");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาด".mysqqli_error($conn);
    }
?>