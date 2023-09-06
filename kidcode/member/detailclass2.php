<?php
  require('../condb.php');
  session_start();
  if(isset($_REQUEST['check_id'])){
    $id = $_REQUEST['check_id'];
    $sel = "SELECT * FROM teacher_schedule INNER JOIN subject ON teacher_schedule_subject = subject_id INNER JOIN member ON member_id = teacher_schedule_name INNER JOIN branch ON teacher_schedule_branch = branch_id WHERE teacher_schedule_id = '$id'";
    $result = mysqli_query($conn, $sel);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $sub_name = $row['subject_name'];
      $time = $row['teacher_schedule_starttime']." ถึง ".$row['teacher_schedule_endtime'];
      $tech = $row['member_fullname'];
      $major = $row['branch_name'];
      $num = $row['subject_number'];
      $tel = $row['member_tel'];
      $amoung = $row['subject_amount'];
      $text = $row['subject_detail'];
    }

  }
  if (!isset($_SESSION['stu_username'])) {
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
  <title>รายละเอียดวิชา</title>

  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="shortcut icon" type="image/jpg" href="../img/3.jpg"/>
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
    <a href="indexstu.php" class="brand-link">
      <img src="../img/2.png" alt="kid'd code Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KID'D CODE</span>
    </a>





    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['stu_photo'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="indexstu.php" class="d-block"><?php echo $_SESSION['stu_fullname'];?></a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="project.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                ผลการเรียน
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="detailclass.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                รายละเอียดวิชา
              </p>
            </a>

            <li class="nav-item">
                <a href="cash.php" class="nav-link">
                    <i class="nav-icon fas fa-coins"></i>
                  <p>
                    การเงิน
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="edit.php" class="nav-link">
                    <i class="nav-icon fas fa-user-edit"></i>
                  <p>
                    แก้ไขข้อมูลส่วนตัว
                  </p>
                </a>
              </li>

            <li class="btn-danger">
                <a href="detailclass2.php?logout='1'" class="nav-link ">
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





  <!-- Content Wrapper. Contains page content  เนื้อหา-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <h1 class="m-0">รายละเอียดวิชา</h1><br>
        </div><!-- /.row -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="nameclass">ชื่อวิชา</label>
                  <input type="nameclass" class="form-control col-sm-0" id="nameclass" placeholder="" name="nameclass" disabled value="<?php echo $sub_name; ?>">
                </div>
                <div class="form-group">
                  <label for="time">เวลา</label>
                  <input type="text" class="form-control" id="time" placeholder="" name="time" disabled value="<?php echo $time; ?>">
                </div>
                <div class="form-group">
                  <label for="major">สาขา</label>
                  <input type="major" class="form-control col-sm-0" id="major" placeholder="" name="major" disabled value="<?php echo $major; ?>">
                </div>
                <div class="form-group">
                    <label for="teacher">อาจารย์ผู้สอน</label>
                    <input type="teacher" class="form-control" id="teacher" placeholder="" name="teacher" disabled value="<?php echo $tech; ?>">
                  </div>
                
            <div class="form-group">
                <label for="cost">จำนวนคอร์ส</label>
                <input type="text" class="form-control" id="cost" placeholder="" name="cost" disabled value="<?php echo $num; ?>">
              </div>
                  <div class="form-group">
                    <label for="tel">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control" id="tel" placeholder="" name="tel" disabled value="<?php echo $tel; ?>"> 
                  </div>
                  <div class="form-group">
                    <label for="price">ราคา</label>
                    <input type="price" class="form-control" id="price" placeholder="" name="price" disabled value="<?php echo $amoung; ?>">
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>รายละเอียดวิชา</label>
                        <textarea class="form-control" rows="3" placeholder="<?php echo $text; ?>" name="text" disabled ></textarea>
                      </div>
                    </div>
                  </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


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
</body>
</html>
