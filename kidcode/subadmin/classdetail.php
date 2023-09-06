<?php 
  require('../condb.php');
  if(isset($_REQUEST['edit_sub'])){
    $id = $_REQUEST['edit_sub'];
    $sql = ("SELECT * FROM subject WHERE subject_id = '$id'");
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $subjectid = $row['subject_id'];
      $subjectname = $row['subject_name'];
      $subjectcost = $row['subject_number'];
      $subjectprice = $row['subject_amount'];
      $subjecttext = $row['subject_detail'];
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>รายละเอียดวิชา</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../style.css">
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
            <h1 class="m-0">รายละเอียดวิชา</h1><br>
        </div><!-- /.row -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="editsubject.php?edit=<?php echo $subjectid; ?>" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="numberclass">รหัสรายวิชา</label>
                  <input type="numberclass" class="form-control col-sm-0" id="numberclass" disabled  name="numberclass" value="<?php echo $subjectid;?>">
                </div>
                <div class="form-group">
                  <label for="nameclass">ชื่อวิชา</label>
                  <input type="nameclass" class="form-control col-sm-0" id="nameclass" placeholder="" name="nameclass" value="<?php echo $subjectname;?>">
                </div>
            <div class="form-group">
                <label for="cost">จำนวนครั้งคอร์ส</label>
                <input type="text" class="form-control" id="cost" placeholder="" name="cost" value="<?php echo $subjectcost;?>">
              </div>
                  <div class="form-group">
                    <label for="price">ราคา</label>
                    <input type="price" class="form-control" id="price" placeholder="" name="price" value="<?php echo $subjectprice;?>">
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>รายละเอียดวิชา</label>
                        <textarea class="form-control" rows="3" placeholder="<?php echo $subjecttext ;?>" name="text" ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                  <a href="tableclass.php" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</a>
                  <button type="submit" class="btn btn-outline-success" name="edit_subject">ยืนยัน</button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </div>
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
