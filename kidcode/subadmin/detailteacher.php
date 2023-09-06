<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>รายละเอียดอาจารยฺ์</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
 <!-- iCheck -->
 <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- JQVMap -->
 <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
 <!-- summernote -->
 <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
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

 <!-- Content Wrapper. Contains page content  เนื้อหา-->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <h1 class="m-0">รายละเอียดอาจารย์</h1><br>
        </div><!-- /.row -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
              <div class="form-group">
                  <div class="image">
                  <img id="imgAvatar" height="150px" width="150px">
                  </div>
                  <div class="input-group">
                  <div class="custom-file" >
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="image" OnChange="showPreview(this)" >
                  <label class="custom-file-label" for="exampleInputFile"></label>
                  </div>
                  </div>
                  </div>
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="username" class="form-control col-sm-0" id="username1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control col-sm-0" id="password1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="kidpass">รหัสพนักงาน</label>
                    <input type="kidpass" class="form-control" id="kidpass1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="address">ชื่อ</label>
                    <input type="address" class="form-control col-sm-12" id="address1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="address">นามสกุล</label>
                    <input type="address" class="form-control col-sm-12" id="address1" placeholder="">
                  </div>
                <div class="form-group">
                    <label for="kidpass">รหัสบัตรประชาชน</label>
                    <input type="kidpass" class="form-control" id="kidpass1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="kidpass">วันเดือนปีเกิด</label>
                    <input type="kidpass" class="form-control" id="kidpass1" placeholder="">
                  </div>
                <div class="form-group row">
                    <label for="tel" class="col-xs-6 col-form-label">เบอร์โทรศัพท์ </label>
                    <div class="col-sm-12">
                      <input type="tel" class="form-control" id="tel" placeholder="" name="tel">
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="line" class="col-xs-6 col-form-label">line</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="line" placeholder="" name="line">
                    </div>  
                </div>
                <div class="form-group row">
                  <label for="facebook" class="col-xs-6 col-form-label">facebook</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="facebook" placeholder="" name="facebook">
                  </div>  
              </div>
                <div class="form-group row">
                    <label for="email" class=" col-form-label">E-mail</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="email" placeholder="" name="email">
                    </div>  
                </div>
                <div class="form-group row">
              <label for="startdate" class="col-xs-6 col-form-label">วันที่สมัคร</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="startdate" placeholder="" name="startdate">
              </div>  
          </div>
          <div class="form-group row">
              <label for="Contract" class="col-xs-6 col-form-label">วันทำสัญญา</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="Contract" placeholder="" name="Contract">
              </div> 
            </div>
                <div class="form-group row">
                  <label for="major" class="col-xs-6 col-form-label">ประจำสาขา</label>
                  <div class="col-sm-12">
                    <input type="major" class="form-control" id="lineface1" placeholder="" name="major">
                  </div>  
              </div>
              <div class="modal-footer justify-content-between">
                   <button type="reset" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</button>
                   <button type="submit" class="btn btn-outline-success" name="add_major">ยืนยัน</button>
                  </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>






  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
