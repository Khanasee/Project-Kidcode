<?php 
        session_start();
        require('../condb.php');
        $errors = array();

        if (isset($_POST['edit_id'])) {
                $id = $_GET['edit'];
                        $major = mysqli_real_escape_string($conn, $_POST['major']);
                        $address = mysqli_real_escape_string($conn, $_POST['address']);
                        $map = $_POST['map'];
                        foreach($_POST['provi'] as $provice){

                        }

                if(empty($map)){
                        $sql = ("SELECT branch_map FROM branch WHERE branch_id = '$id'");
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $map = $row['branch_map'];
                        }
                }
                 
                if($_FILES["image"]["name"] == ""){
                        $sql = ("SELECT branch_photo FROM branch WHERE branch_id = '$id'");
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $photo = $row['branch_photo'];
                        }
                }  
                        
                if($_FILES["image"]["name"] != ""){      
                        $dir = "../upload/";
                        $photo = $dir . basename($_FILES["image"]["name"]);
                        if(move_uploaded_file($_FILES["image"]["tmp_name"], $photo)){  
                                
                        }
                }
                
                
                $sql = ("UPDATE branch set branch_name = '$major', branch_address = '$address', branch_map = '$map', branch_photo = '$photo', branch_county= '$provice' WHERE branch_id = '$id'");
                $result = mysqli_query($conn, $sql);
                header('location: major.php');

                
                


        }   
    