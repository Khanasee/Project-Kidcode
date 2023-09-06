<?php 
    session_start();
    require('../condb.php');
    include('../errors.php'); 
    $id = $_SESSION['stu_id'];
    $sql = ("SELECT * FROM student WHERE student_id = '$id'");
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $photo = $row['student_photo'];
      $name = $row['student_fullname'];
      $mem_birth = date('Y',strtotime($row['student_birth']));
      $year = date('Y')+543;
      $age = $year-$mem_birth;
      $line = $row['student_line'];
      $facebook = $row['student_facebook'];
      $tel = $row['student_tel'];
      $email = $row['student_email'];

    }
    if (!isset($_SESSION['stu_username'])) {
        $_SESSION['error'] = "You must log in first";
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
  <title>แก้ไขข้อมูลส่วนตัว</title>

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
                <a href="edit.php?logout='1'" class="nav-link ">
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
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">แก้ไขรหัสผ่าน</h3>
                </div>
              </div>
                <div class="card card-info">
                  <div class="card-header">
                  </div>
                  <form action="editpassword.php?edit=<?php echo $_SESSION['stu_id']; ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                    <div class="form-group row">
                        <label for="passwordtext" class="col-xs-12 col-form-label">password</label>
                        <div class="col-sm-11">
                          <input type="password" class="form-control" id="password" placeholder="" name="password_1">
                        </div>  
                    </div>
                  <div class="form-group row">
                    <label for="passwordconfirm text" class="col-xs-12 col-form-label">confirm password</label>
                    <div class="col-sm-11">
                      <input type="password" class="form-control" id="passwordconfirm" placeholder="" name="password_2">
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="passwordconfirm text" class="col-xs-12 col-form-label">old password</label>
                    <div class="col-sm-11">
                      <input type="password" class="form-control" id="passwordconfirm" placeholder="" name="password_3">
                    </div>  
                </div>
                  <div class="card-footer" >
                    <button type="submit" class="btn btn-primary" name="edit_pass">Submit</button>
                  </div>
                </form>   
                </form>   
                <div class="d-flex flex-row justify-content-end">
              
                </div>
              </div>
            </div>
          </div>
           </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">แก้ไขข้อมูลส่วนตัว</h3>
                </div>
              </div>
              <div class="card card-success">
                <div class="card-header">
                </div>
              <form action="editupdate.php?edit=<?php echo $_SESSION['stu_id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                  <div class="form-group">
                   <label for="exampleInputFile">รูปภาพ</label>
                  <div class="image">
                  <div align="center">
                  <img  src="<?php echo $photo; ?>" id="imgAvatar" height="150px" width="150px">
                  </div>
                  </div>
                  <div class="input-group">
                  <div class="custom-file" >
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="image" OnChange="showPreview(this)" >
                  <label class="custom-file-label" for="exampleInputFile"></label>
                  </div>
                  </div>
                  </div>
                      <div class="form-group">
                        <label for="name">ชื่อ-นามสกุล</label>
                        <input type="name" class="form-control" id="name" placeholder="" name="name" value="<?php echo $name; ?>">
                      </div>
                      <div class="form-group">
                        <label for="age">อายุ</label>
                        <input type="age" class="form-control" id="age" placeholder="" name="age" value="<?php echo $age;?>">
                      </div>
                      <div class="form-group">
                        <label for="line">line</label>
                        <input type="line" class="form-control" id="line" placeholder="" name="line" value="<?php echo $line;?>">
                      </div>
                      <div class="form-group">
                        <label for="facebook">facebook</label>
                        <input type="facebook" class="form-control" id="facebook" placeholder="" name="facebook" value="<?php echo $facebook;?>">
                      </div>
                      <div class="form-group">
                        <label for="tel">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="tel" placeholder="" name="tel" value="<?php echo $tel;?>">
                      </div>
                      <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="<?php echo $email;?>" name="email">
                      </div> 
                    </div>
                  <div class="card-footer" >
                    <button type="submit" class="btn btn-primary" name="edit_update">Submit</button>
                  </div>
                </form>
                </div>
            </div>
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
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
