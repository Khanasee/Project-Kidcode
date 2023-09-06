<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เช็คชื่อ</title>

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
    <a href="indextech.php" class="brand-link">
      <img src="../img/2.png" alt="kid'd code Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KID'D CODE</span>
    </a>





    <!-- Sidebar ตำแหน่ง -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['tech_photo'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="indextech.php" class="d-block"><?php echo $_SESSION['tech_fullname'];?></a>
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
                <a href="indextech.php?logout='1'" class="nav-link ">
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Digital art</h1>
          </div><!-- /.col -->
</div><!-- /.row -->

<div class="content-header">
  <div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <div class="form-group">
                  <label>Date and time range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime">
                  </div>
                  <!-- /.input group -->
                </div>
                  <h3 class="card-title"></h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อนักเรียน</th>
                        <th>ครั้งที่</th>
                        <th>เช็คชื่อ</th>
                        <th>ลงผลงาน</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>01</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td>
                  <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected"></option>
                    <option>มา</option>
                    <option>ไม่มา</option>
                  </select>
                <!-- /.form-group -->
                  </td>
                        <td> 
                        <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus"> เพิ่มผลงาน</i></button>
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
              </div>
          </div>
        </form>
      </div>
      <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มผลงาน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="numclass">รหัสวิชา</label>
                  <input type="numclass" class="form-control col-sm-12" id="numclass" placeholder="" name="numclass">
                </div>
                <div class="form-group">
                  <label for="nameclass">ชื่อวิชา</label>
                  <input type="nameclass" class="form-control col-sm-12" id="nameclass" placeholder="" name="nameclass">
                </div>
                <div class="form-group">
                  <label for="numstudent">รหัสนักเรียน</label>
                  <input type="numstudent" class="form-control col-sm-12" id="numstudent" placeholder="" name="numstudent">
                </div>
                <div class="form-group">
                  <label for="name">ชื่อนักเรียน</label>
                  <input type="name" class="form-control col-sm-12" id="name" placeholder="" name="name">
                </div>
                <div class="form-group">
                  <label for="date">วันที่</label>
                  <input type="date" class="form-control col-sm-12" id="date" placeholder="" name="date">
                </div>
                <div class="form-group">
                     <label for="exampleInputFile">รูปภาพ</label>
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
                <div class="form-group row">
                  <label for="file" class="col-xs-6 col-form-label">ไฟล์</label>
                  <div class="col-sm-12">
                    <input type="file" class="form-control" id="file" placeholder="" name="file">
                  </div>  
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>ความคิดเห็นของอาจารย์</label>
                    <textarea class="form-control" rows="3" placeholder="" name="text"></textarea>
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-outline-success">ยืนยัน</button>
      </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  </div><!-- /.container-fluid -->

</div>



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
