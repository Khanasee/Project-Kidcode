<?php
    session_start();
    require('../condb.php');
    $errors = array();

    if(isset($_POST['add_subadminmajor'])){
        $major = mysqli_real_escape_string($conn, $_POST['major']);
        foreach($_POST['subadmin'] as $subadmin){
            $sba = $subadmin;
        }
        
        $sql2 = ("SELECT * FROM branch WHERE branch_name = '$major'");
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
            $branch = $row2['branch_id'];
        }
       

        if (count($errors) == 0) {
            $del1 = "SELECT * FROM branch WHERE branch_id = '$branch'";
            $result_del1 = mysqli_query($conn, $del1);
            while($row = mysqli_fetch_array($result_del1, MYSQLI_ASSOC)){
                $branch_id = $row['branch_id'];
                $tech_id = $row['branch_onwer'];
            }
            $del2 = "DELETE FROM tech WHERE tech = '$tech_id' AND major = '$branch_id'";
            mysqli_query($conn,$del2);
            $sql = ("UPDATE branch set branch_onwer = '$sba' WHERE branch_id = '$branch'");
            $result = mysqli_query($conn, $sql);
            $sql2 = "INSERT INTO tech (tech,major) VALUES('$sba','$branch')";
            mysqli_query($conn,$sql2);
        header('location: major.php');
            
        } else {
            header("location: major.php");
        }

        
        
    }




?>