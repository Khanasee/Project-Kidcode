<?php
  require('../condb.php');
  if(isset($_REQUEST['add_subid'])){
    $id = $_REQUEST['add_subid'];
    $sql = ("SELECT * FROM branch WHERE branch_id = '$id'");
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $majorid = $row['branch_id'];
      $majorname = $row['branch_name'];
      $majoraddress = $row['branch_address'];
    }

    $sql2 = ("SELECT * FROM member WHERE member_rank = 's'");
    $result2 = mysqli_query($conn, $sql2);
  }
  session_start();
  if (!isset($_SESSION['username'])) {
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
  <title>เพิ่มเจ้าของสาขา</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="style.css">
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
    <a href="index.php" class="brand-link">
      <img src="../img/2.png" alt="kid'd code Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KID'D CODE</span>
    </a>





    <!-- Sidebar ตำแหน่ง -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['photo'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $_SESSION['fullname'];?></a>
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
                    <a href="projectstu.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>ผลงานนักเรียน</p>
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
                    <a href="subadmin.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>เจ้าของสาขา</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="techdetail.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>อาจารย์ผู้สอน</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tableclass.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>รายวิชา</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="learn.php" class="nav-link">
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
                  <a href="addclass.php?logout='1'" class="nav-link ">
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
            <h1>สาขาเพิ่มเจ้าของสาขา</h1><br>
        </div><!-- /.row -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="addsubadminmajor.php" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="idmajor">รหัสสาขา</label>
              <input type="text" class="form-control col-sm-12" id="idmajor" name="idmajor" disabled value="<?php echo $majorid ;?>">
            </div>
            <div class="form-group">
              <label for="major">สาขา</label>
              <input type="text" class="form-control col-sm-12" id="major" name="major"  value="<?php echo $majorname ;?>">
            </div>
            <div class="form-group">
              <label for="address">ที่อยู่</label>
              <input type="text" class="form-control col-sm-12" id="address" name="address" disabled value="<?php echo $majoraddress ;?>">
            </div>
            <div class="form-group">
            <label for="exampleSelectBorder">เจ้าของสาขา</label>
            <select class="custom-select form-control-border" id="exampleSelectBorder" name="subadmin[]">
            <?php while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){ ?>
              <option value="<?php echo $row2['member_id'];?>"><?php echo $row2['member_fullname'];?></option>
            <?php } ?>
            </select>
          </div>
            <div align="right">
              <button type="submit" class="btn btn-outline-success" name="add_subadminmajor">ยืนยัน</button>
            </div>
        </form>
          </div>
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content-header -->
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
