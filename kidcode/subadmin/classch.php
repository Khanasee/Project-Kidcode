<?php 
  require('../condb.php');
  session_start();
  if(isset($_REQUEST['add_id'])){

     $id = $_REQUEST['add_id'];
     $sql = ("SELECT * FROM teacher_schedule WHERE teacher_schedule_id = '$id'");
     $result = mysqli_query($conn , $sql);
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       $subject1 = $row['teacher_schedule_subject'];
       $branch = $row['teacher_schedule_branch'];
       $tech = $row['teacher_schedule_name'];
       $date = $row['teacher_schedule_date'];
       $sttime = $row['teacher_schedule_starttime'];
       $endtime = $row['teacher_schedule_endtime'];
     }
     $sel_subject = ("SELECT * FROM subject WHERE subject_id = '$subject1'");
     $result_sub = mysqli_query($conn, $sel_subject);
     while($row = mysqli_fetch_array($result_sub, MYSQLI_ASSOC)){
       $subject = $row['subject_name'];
     }

     $sel_tech = ("SELECT * FROM member WHERE member_id = '$tech'");
     $result_tech = mysqli_query($conn , $sel_tech);
     while($row = mysqli_fetch_array($result_tech, MYSQLI_ASSOC)){
       $tech = $row['member_fullname'];
     }

     $sel_stu = ("SELECT * FROM student WHERE student_branch = '$branch'");
     $result_stu = mysqli_query($conn , $sel_stu);


     $sel_show = ("SELECT *  FROM student AS d1
                  INNER JOIN class_schedule AS d2
                  ON  (d1.student_id = d2.class_schedule_student)
                  INNER JOIN attend_class AS d3
                  ON (d2.class_schedule_id = d3.attend_class_schedule)
                  WHERE class_schedule_branch = '$branch' AND class_schedule_subject = '$subject1' AND class_schedule_teacher = '$id'");
    $resultshow = mysqli_query($conn, $sel_show);

    $r = 1; 

  }
  
  if (!isset($_SESSION['sub_username'])) {
    header('location: ../index.php');
  }

  if (isset($_GET['logout'])) {
      session_destroy();
      header('location: ../index.php');
  } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ตารางสอน</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="shortcut icon" type="image/jpg" href="../img/3.jpg"/>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      </li>
    </ul>
    <!-- Right navbar links -->
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container โลโก้ด้านบน -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="indexjk.php" class="brand-link">
      <img src="../img/2.png" alt="kid'd code Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KID'D CODE</span>
    </a>





     <!-- Sidebar ตำแหน่ง -->
     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['sub_photo'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="indexjk.php" class="d-block"><?php echo $_SESSION['sub_fullname'];?></a>
        </div>
      </div>


      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                นักเรียน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addstudent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มรายชื่อนักเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="detailstudent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายละเอียดนักเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="projectstudent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ผลงานนักเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="check.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เช็คชื่อ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                สาขา
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="major.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สาขา</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tech.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>อาจารย์ผู้สอน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="class.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ตารางสอน</p>
                </a>
              </li>

            </ul>
              <li class="nav-item">
                <a href="edit.php" class="nav-link">
                    <i class="nav-icon fas fa-user-edit"></i>
                  <p>
                    แก้ไขข้อมูลส่วนตัว
                  </p>
                </a>
              </li>
              <li class="btn-danger">
                  <a href="indexjk.php?logout='1'" class="nav-link ">
                    <i class="fas fa-power-off" style="color: white;"> </i>
                  <p style="color: white;">
                   LOGOUT
                  </p>
                </a>
              </li> 
          </li>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid" >
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">เพิ่มนักเรียนในรายวิชา</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

                  <div class="col-md-12">
                  <div class="form-group">
                        <label for="name">วิชา</label>
                        <input type="name" class="form-control" id="name"  disabled placeholder="" name="name" value="<?php echo $subject; ?>">
                      </div>
                      <div class="form-group">
                        <label for="surname">วัน เวลา</label>
                        <input type="surname" class="form-control" id="surname"  disabled placeholder="" name="surname" value="วัน <?php echo $date?> เวลา <?php echo $sttime?> ถึง <?php echo $endtime?>">
                      </div>
                      <div class="form-group">
                        <label for="education">ผู้สอน</label>
                        <input type="education" class="form-control"  disabled id="education" placeholder="" name="education" value="<?php echo $tech; ?>">
                      </div>
                      <div class="form-group">
              <label for="provi">รายชื่อนักเรียน</label>
              <form action="addstudent_class.php?add_id=<?php echo $id;?>" method="post">
              <select name="stu[]" input type="text" class="form-control col-12 col-sm-12" id="provi" name="provi" >
                 <?php while($row = mysqli_fetch_array($result_stu, MYSQLI_ASSOC)){?>
                 <option value="<?php echo $row['student_id'];?>"><?php echo $row['student_fullname']; ?></option>
                 <?php }?>
            </select>  <button type="submit" class="btn btn-info btn-flat col-12 col-sm-12" name="add_stu_class">ยืนยัน</button>
</form>
            </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
              <div class="col-md-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 100%;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>ลำดับที่</th>
                          <th>ชื่อ - นามสกุล</th>
                          <th>ชื่อเล่น</th>
                          <th>จำนวนครั้ง</th>
                          <th>บทเรียนที่</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row2 = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){?>
                        <tr>
                          
                          <td><?php echo $r++;?></td>
                          <td><?php echo $row2['student_fullname'];?></td>
                          <td><?php echo $row2['student_nic'];?></td>
                          <td><?php echo $row2['attend_class_num'];?></td>
                          <td><?php echo $row2['attend_class_num'];?></td>
                          <td><a href="deleteclassch.php?del_id=<?php echo $row2['class_schedule_id'];?>" class="btn btn-outline-danger" onclick="return confirm('ต้องการลบนักเรียนออกจากวิชานี้ไหม')">ลบข้อมูล</a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
</div>    
</div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script language="JavaScript">
                  function showPreview(ele)
                  {
                      $('#imgAvatar').attr('src', ele.value); // for IE
                            if (ele.files && ele.files[0]) {
                      
                                var reader = new FileReader();
                        
                                reader.onload = function (e) {
                                    $('#imgAvatar').attr('src', e.target.result);
                                }
                
                                reader.readAsDataURL(ele.files[0]);
                            }
                  }

                </script>
</body>
</html>
