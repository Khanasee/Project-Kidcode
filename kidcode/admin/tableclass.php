<?php
  require('../condb.php');

  $sql = ("SELECT * FROM subject WHERE subject_id != 'sub0'");
  $result = mysqli_query($conn, $sql);

  session_start();
  $errors = array();
  include('errors.php'); 
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
  <title>รายวิชา</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
  
  <div class="content-wrapper">
  <?php if (isset($_SESSION['error'])) : ?>
       <div class="error">
       <div align="center">
           <?php
           
           echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'] ;
                
                   unset($_SESSION['error']);
               ?>
          </div>
       </div>
   <?php endif ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
        <div class="col-sm-2">
              <h1>รายวิชา</h1>
            </div>
            <div class="col-sm-10">
              <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus">เพิ่มรายวิชา</i></button>
              </ol>
            </div>
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
                    <div class="card-body table-responsive p-0" style="height: 100%;">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ชื่อวิชา</th>
                          <th>จำนวนคอร์ส</th>
                          <th>ราคาทั้งคอร์ส (บาท)</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                          <td><?php echo $row['subject_name']; ?></td>
                          <td><?php echo $row['subject_number']; ?></td>
                          <td><?php echo $row['subject_amount']; ?></td>
                          <td>
                            <a href="classdetail.php?edit_sub=<?php echo $row['subject_id']; ?>"><button type="button" class="btn btn-outline-info">รายละเอียดวิชา</button></a>
                            <a href="deletesubject.php?del_id=<?php echo $row['subject_id'];?>" class="btn btn-outline-danger"  onclick="return confirm('ต้องการลบวิชานี้ไหม')">ลบข้อมูลรายวิชา</a></td>
                        </tr>
                        <?php } ?>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มรายวิชา</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="addsubject.php" method="POST" >
          <div class="card-body">
            <div class="form-group">
              <label for="numberclass">รหัสรายวิชา</label>
              <input type="text" class="form-control col-sm-0" id="numberclass" placeholder="" name="idclass">
            </div>
            <div class="form-group">
              <label for="nameclass">ชื่อวิชา</label>
              <input type="text" class="form-control col-sm-0" id="nameclass" placeholder="" name="nameclass">
            </div>
            <div class="form-group">
                <label for="cost">จำนวนเรียนของคอร์สทั้งหมด</label>
                <input type="text" class="form-control" id="cost" placeholder="" name="cost">
              </div>
            <div class="form-group">
              <label for="nameclass">ราคาทั้งคอร์ส (บาท)</label>
              <input type="text" class="form-control col-sm-0" id="nameclass" placeholder="" name="allprice">
            </div>
            <div class="form-group">
              <label for="nameclass">ราคาต่อเดือน(บาท)</label>
              <input type="text" class="form-control col-sm-0" id="nameclass" placeholder="" name="price">
            </div>
              <div class="row">
                <div class="col-sm-10">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>รายละเอียดวิชา</label>
                    <textarea class="form-control" rows="3" placeholder="" name="text"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
              <button type="reset" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-outline-success" name="add_subjact">ยืนยัน</button>
              </div>
                  </form>
                  </div>

    </div><!-- /.container-fluid -->
  </div>
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
