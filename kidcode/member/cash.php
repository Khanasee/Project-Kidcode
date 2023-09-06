<?php 
  require('../condb.php');
  session_start();
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
  <title>การเงิน</title>

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
                <a href="cash.php?logout='1'" class="nav-link ">
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
        <div class="row mb-3">
          <div class="col-sm-3">
            <h1 class="m-0">ใบเสร็จรับเงิน</h1><br>
          </div><!-- /.col -->
        </div><!-- /.row -->

            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 100%;">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>user</th>
                            <th>รายชื่อ</th>
                            <th>ชื่อเล่น</th>
                            <th>สาขา</th>
                            <th>ผู้ปกครอง</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="moneydetail.php"><button type="button" class="btn btn-outline-info">รายละเอียด</button></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">ลบข้อมูล</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-outline-light">ยืนยัน</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard3.js"></script>
</body>
</html>
