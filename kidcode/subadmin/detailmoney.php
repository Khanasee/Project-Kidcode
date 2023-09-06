<?php
  session_start();
  require('../condb.php');
  include('errors.php'); 

  $count_stu = "SELECT * from student";
  $result2 = mysqli_query($conn, $count_stu); 
  $total = mysqli_num_rows($result2);

  $count_major = "SELECT * from branch WHERE branch_id != 's00'";
  $result3 = mysqli_query($conn, $count_major); 
  $total2 = mysqli_num_rows($result3);

  $count_sj = "SELECT * from subject";
  $result4 = mysqli_query($conn, $count_sj); 
  $total3 = mysqli_num_rows($result4);

  $major = ("SELECT * FROM branch");
  $result_major = mysqli_query($conn , $major);

  if(!isset($_GET['sel_major'])){
    $select_major = "สาขาทั้งหมด";
    $show = "SELECT * FROM student";
    $result_show = mysqli_query($conn , $show);
  }
  
  if(isset($_GET['sel_major'])){
    $select_major = $_GET['sel_major'];
    $sql = "SELECT * FROM branch WHERE branch_name = '$select_major'";
    $result_mj = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result_mj, MYSQLI_ASSOC)){
      $branch_id = $row['branch_id'];
    }
    $show = "SELECT * FROM student WHERE student_branch = '$branch_id'";
     $result_show = mysqli_query($conn , $show);
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
  <title>การชำระเงิน</title>

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
        <div class="row mb-9">
        <a class="btn btn-app">
                  <i class="fas fa-save"></i> save
                </a>
                <a class="btn btn-app">
                  <i class="fas fa-inbox"></i> Print
                </a>
                <a class="btn btn-app">
                  <i class="fas fa-envelope"></i> save and send
                </a>
        <div class="col-sm-3">
          </div>
        </div><!-- /.row -->

            <!-- /.card-header -->
            <!-- form start -->
            <form>
            <div class="card card-info">
                <div class="card-body">

                <div >
                <h6 align = "center"style="font-size:24px">ใบแจ้งการชำระเงิน / ใบเสร็จรับเงิน<br></h6>
                </div>

                <div class="form-group row">
                <img src="../img/2.png" alt="kid'd code Logo" class="brand-image img-circle" style="opacity: 1" width="90" height="90">
                <p  class="col-xs-8 col-form-label" style="font-size:42px"> &nbsp;Kid'd coding <br></p>
                <div class="col-sm-10"><br>
                </div></div>


                <div class="row">
                  <div class="col-lg-8">
                    <div class="input-group">
                      <div class="input-group-prepend">
                           <p style="font-size:20px"> ชื่อ - นามสกุล &nbsp;&nbsp;</p> 
                      </div>
                      <input type="email" class="form-control" id="inputEmail3" placeholder=""> 
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-4">
                    <div class="input-group">
                    <p style="font-size:20px"> เลขเอกสารอ้างอิง &nbsp;&nbsp;</p> 
                      <input type="text" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div><br>

                <div class="row">
                  <div class="col-lg-5">
                    <div class="input-group">
                      <div class="input-group-prepend">
                           <p style="font-size:20px"> เบอร์โทรศัพท์ &nbsp;&nbsp;</p> 
                      </div>
                      <input type="email" class="form-control" id="inputEmail3" placeholder=""> 
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-4">
                    <div class="input-group">
                    <p style="font-size:20px"> สาขา &nbsp;&nbsp;</p> 
                      <input type="text" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group">
                    <p style="font-size:20px"> วันที่ &nbsp;&nbsp;</p> 
                      <input type="date" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div><br>

                <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr style="font-size:18px" align="center">
                      <th style="width: 1%">ที่</th>
                      <th style="width: 10%">รายการ</th>
                      <th style="width: 30%">เวลา</th>
                      <th style="width: 10%">เรียนครั้งที่</th>
                      <th style="width: 30%">ผู้สอน</th>
                      <th style="width: 30%">ราคา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr align="center">
                        <td>1</td>
                        <td>gravit</td>
                        <td>จันทร์ 9.00 - 12.00 </td>
                        <td> 4 </td>
                        <td>นาย ก</td>
                        <td>1500</td>
                    </tr>
                    <tr align="center">
                        <td>1</td>
                        <td>gravit</td>
                        <td>จันทร์ 9.00 - 12.00 </td>
                        <td> 4 </td>
                        <td>นาย ก</td>
                        <td>1500</td>
                    </tr>
                    <tr align="center">
                        <td>1</td>
                        <td>gravit</td>
                        <td>จันทร์ 9.00 - 12.00 </td>
                        <td> 4 </td>
                        <td>นาย ก</td>
                        <td>1500</td>
                    </tr>
                    <tr align="center">
                        <td>1</td>
                        <td>gravit</td>
                        <td>จันทร์ 9.00 - 12.00 </td>
                        <td> 4 </td>
                        <td>นาย ก</td>
                        <td>1500</td>
                    </tr>

                    <thead>
                    <tr style="font-size:18px" align="center">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th >ส่วนลด</th>
                      <th ><div class="col-lg-8">
                    <div class="input-group">
                      <input type="text" class="form-control" style="text-align:center;">&nbsp; %
                    </div>
                  </div>
                        </th>
                    </tr>
                    <tr align="center">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th >VAT 7%</th>
                      <th><div class="col-lg-8">
                    <div class="input-group">
                      <input type="text" class="form-control" style="text-align:center;">
                    </div>
                  </div></th>
                    </tr>
                    <tr align="center">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th >รวม</th>
                      <th><div class="col-lg-8">
                    <div class="input-group">
                      <input type="text" class="form-control" style="text-align:center;">
                    </div>
                  </div></th>
                    </tr>
                    <tr align="center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                  </td>
                    </tr>
                  </thead>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="row">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <div class="input-group-prepend">
                           <p style="font-size:20px"> ผู้รับเงิน &nbsp;&nbsp;</p> 
                      </div>
                      <input type="email" class="form-control" id="inputEmail3" placeholder=""> 
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
            </div>
            </form>
          </div>
    </div>
  </div>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->



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
