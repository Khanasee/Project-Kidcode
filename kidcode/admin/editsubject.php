<?php 
    require('../condb.php');
    if(isset($_POST['edit_subject'])){
        $id = $_GET['edit'];
        $subjectname = mysqli_real_escape_string($conn, $_POST['nameclass']);
        $subjectcost = mysqli_real_escape_string($conn, $_POST['cost']);
        $subjectprice = mysqli_real_escape_string($conn, $_POST['price']);
        $subjecttext = mysqli_real_escape_string($conn, $_POST['text']);
        $check = "SELECT MAX(chapter_num) AS num FROM detail_subject WHERE subject_id = '$id';";
        $result_check = mysqli_query($conn, $check);
        while($row = mysqli_fetch_array($result_check, MYSQLI_ASSOC)){
            $max = $row['num'];
        }
        $maxnew = $subjectcost;


        if($maxnew > $max){
            $newtt = $maxnew-$max;
            for($i=1; $i<=$newtt;$i++){

            $check = "SELECT MAX(chapter_num) AS num FROM detail_subject WHERE subject_id = '$id';";
            $result_check = mysqli_query($conn, $check);
            while($row = mysqli_fetch_array($result_check, MYSQLI_ASSOC)){
                    $resultnewmax = $row['num'];
            }
                $a=$resultnewmax+1;
            $add_max = "INSERT INTO detail_subject(chapter_num, subject_id) VALUES('$a','$id')";
            mysqli_query($conn,$add_max);


            }
            if(empty($subjecttext)){
                $sql = ("SELECT * FROM subject WHERE subject_id = '$id'");
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $subjecttext = $row['subject_detail'];
                }
            }
            $sql = ("UPDATE subject set subject_name = '$subjectname' , subject_number = '$subjectcost', subject_amount = '$subjectprice', subject_detail = '$subjecttext' WHERE subject_id = '$id'");
            mysqli_query($conn, $sql);
            header('location: tableclass.php');
        }


        if($maxnew < $max){
            $del_max = "DELETE FROM detail_subject WHERE chapter_num > '$subjectcost' AND subject_id = '$id'";
            mysqli_query($conn,$del_max);
            if(empty($subjecttext)){
                $sql = ("SELECT * FROM subject WHERE subject_id = '$id'");
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $subjecttext = $row['subject_detail'];
                }
            }
            $sql = ("UPDATE subject set subject_name = '$subjectname' , subject_number = '$subjectcost', subject_amount = '$subjectprice', subject_detail = '$subjecttext' WHERE subject_id = '$id'");
            mysqli_query($conn, $sql);
            header('location: tableclass.php');
        }


        if($maxnew = $max){
            $realchap = array();
            $realnum = array();
            foreach($_POST['chapter'] as $chap){
                array_push($realchap, $chap);
            }

            foreach($_POST['num_chapter'] as $n){
                array_push($realnum, $n);
            }
    
            foreach($realchap as $index => $value){
                
            $sel_chap = "UPDATE detail_subject SET chapter = '$realchap[$index]' WHERE chapter_num = '$realnum[$index]' AND subject_id = '$id'";
            mysqli_query($conn,$sel_chap);
            }

            if(empty($subjecttext)){
                $sql = ("SELECT * FROM subject WHERE subject_id = '$id'");
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $subjecttext = $row['subject_detail'];
                }
            }
            $sql = ("UPDATE subject set subject_name = '$subjectname' , subject_number = '$subjectcost', subject_amount = '$subjectprice', subject_detail = '$subjecttext' WHERE subject_id = '$id'");
            mysqli_query($conn, $sql);
            header('location: tableclass.php');

        }
       
     
     
    }
    

?>