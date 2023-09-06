<?php 
    require('../condb.php');
    if(isset($_POST['check_st'])){

        $text = $_POST['text'];
        foreach($_POST['schedule'] as $s){
            
        } 
        foreach($_POST['check'] as $check){
            $st[]=$check;
        }
        foreach($_POST['chapter'] as $chapter){
            $ct[]=$chapter;
        }
        
        for($i=0;$i<count($_FILES["port"]["name"]);$i++)
                {
                    $dir = "../portfolio/";
                    $port = $dir . basename($_FILES["port"]["name"][$i]);
                    if($_FILES["port"]["name"][$i] != "")
                    {
                        if(move_uploaded_file($_FILES["port"]["tmp_name"][$i], $port))
                        {
                            
                                $chose = $st[$i];
                                $cha = $ct[$i];
                                $sql = "SELECT * FROM attend_class WHERE attend_class_id = '$chose'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    $num = $row['attend_class_num'];
                                    $class = $row['attend_class_schedule'];
                                }
                                $now = $num+1;
                                $t = date("Y")+543;
                                $date = date("/m/d");
                                $datenow = $t.$date;
                                $sel = "SELECT * FROM class_schedule WHERE class_schedule_id = '$class'";
                                $result_sel = mysqli_query($conn, $sel);
                                while($row = mysqli_fetch_array($result_sel, MYSQLI_ASSOC)){
                                    $stu_id = $row['class_schedule_student'];
                                    $subject_id = $row['class_schedule_subject'];
                                }
                    
                    
                                $insert_port = "INSERT INTO portfolio (portfolio_files, portfolio_date, portfolio_chapter, portfolio_comment, portfolio_class) values ('$port','$datenow','$cha','$text','$class')";
                                mysqli_query($conn, $insert_port);
                                
                                

                                $insert = "INSERT INTO attend_history (attend_history_num, attend_history_date, attend_history_class, attend_history_student) values('$cha','$datenow','$class','$stu_id')";
                                mysqli_query($conn, $insert);

                    
                                $add = "UPDATE attend_class set attend_class_num = '$now' ,attend_class_ci = '$datenow' WHERE attend_class_id = '$chose'";
                                mysqli_query($conn,$add);
                                
                        }
                    }
                }
        
        
            
            header('location: check.php');
        } 
        
   
    

?>




