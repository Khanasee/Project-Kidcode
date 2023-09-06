<?php
  session_start();
  require('../condb.php');
  include('errors.php'); 

  $count_stu = "SELECT * from student";
  $result2 = mysqli_query($conn, $count_stu); 
  $total = mysqli_num_rows($result2);

  $count_major = "SELECT * from branch WHERE branch_show = 's'";
  $result3 = mysqli_query($conn, $count_major); 
  $total2 = mysqli_num_rows($result3);

  $count_sj = "SELECT * from subject";
  $result4 = mysqli_query($conn, $count_sj); 
  $total3 = mysqli_num_rows($result4);

  $major = ("SELECT * FROM branch where branch_show = 's'");
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
  <title>Home Admin</title>

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
  




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
     <?php if (isset($_SESSION['success'])) : ?>
                      <div class="success">
                      <div align="center">
                          <?php
                                  echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'] ;
                                  unset($_SESSION['success']);
                              ?>
                          </div>
                      </div>
                  <?php endif ?>
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">ยินดีต้อนรับ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">จำนวนนักเรียน</span>
                  <span class="info-box-number">
                        <?php echo $total;?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $select_major;?>
                      </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="index.php">สาขาทั้งหมด</a>
              <?php while($row = mysqli_fetch_array($result_major, MYSQLI_ASSOC)) {?>
                <a class="dropdown-item" href="?sel_major=<?php echo $row['branch_name'];?>"><?php echo $row['branch_name'];?></a>
               <?php }?>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="far fa-building"></i></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">สาขา</span>
                  <span class="info-box-number"><?php echo $total2;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fab fa-adversal"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">วิชา</span>
                  <span class="info-box-number"><?php echo $total3;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">รายชื่อนักเรียน สาขา</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 100%;">
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
                  <div class="card-body table-responsive p-0" style="height: 100%;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                      <tr>
                            <th>user</th>
                            <th>รายชื่อ</th>
                            <th>สาขา</th>
                            <th>ผู้ปกครอง</th>
                            <th>เบอร์โทรศัพท์</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php while($row = mysqli_fetch_array($result_show, MYSQLI_ASSOC)) {?>
                            <td><?php echo $row["student_user"];?></td>
                            <td><?php echo $row["student_fullname"];?></td>
                            <td><?php echo $row["student_branch"];?></td>
                            <td><?php echo $row["student_parents"];?></td>
                            <td><?php echo $row["student_tel"];?></td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
</div></section>

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
</body>
</html>
