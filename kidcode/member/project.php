<?php
                                            
  require('../condb.php');
  session_start();
  $id = $_SESSION['stu_id'];
    if (!isset($_SESSION['stu_username'])) {
      header('location: ../index.php');
  }
  
  if (isset($_GET['logout'])) {
      session_destroy();
      header('location: ../index.php');
  }

  $sql = "SELECT * FROM portfolio inner join student on student_id = portfolio_student  WHERE portfolio_student = '$id'";
  $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ผลงานนักเรียน</title>

  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                <a href="project.php?logout='1'" class="nav-link ">
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

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
        <div class="col-sm-3">
            <h1>ผลงานนักเรียน</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 100;">
                    <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                     <th>ชื่อไฟล์</th>
                                     <th>วันเวลา</th>
                                     <th>ชื่อนักเรียน</th>
                                     <th>comment</th>
                                     <th>วิชา</th>
                                     <th>รายระเอียด</th>
                                </tr>
                              </thead>
                            <tbody>
                             <?php while($row = mysqli_fetch_assoc($result)) {?>
                                  <tr>
                                    <td> <?php echo $row['portfolio_files']; ?> </td>
                                    <td> <?php echo $row['portfolio_date']; ?> </td>
                                    <td> <?php echo $row['student_fullname']; ?> </td>
                                    <td> <?php echo $row['portfolio_comment']; ?> </td>
                                    <td> <?php echo $row['portfolio_subject']; ?> </td>
                                    <td>
                                    <a href="<?php echo $row['portfolio_files'];?>" download><button type="button" class="btn btn-outline-info" >ดาวน์โหลด</button></a></td> 
                                  </tr>
                              <?php }?>
                            </tbody>
                            </teble>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>
<!-- /.content -->
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