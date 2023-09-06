<?php
  session_start();
  require('../condb.php');
  $id = $_SESSION['stu_id'];

  
   $errors = array();
   include('../errors.php'); 
   $show = ("SELECT *  FROM class_schedule INNER JOIN teacher_schedule ON class_schedule_teacher = 	teacher_schedule_id INNER JOIN subject ON class_schedule_subject = subject_id INNER JOIN branch ON class_schedule_branch = branch_id INNER JOIN member ON teacher_schedule_name = member_id WHERE class_schedule_student = '$id'");
          $result_show = mysqli_query($conn, $show);

                                                   
 
  
  
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
  <title>รายวิชา</title>

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
                <a href="detailclass.php?logout='1'" class="nav-link ">
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
              <h1>ตารางเรียน</h1>
            </div>
            
        </div><!-- /.row -->

            <!-- /.card-header -->
            <!-- form start -->
            
               
              </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 100%;">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ชื่อวิชา</th>
                          <th>สาขา</th>
                          <th>อาจารย์ผู้สอน</th>
                          <th>วันที่-เวลา</th>
                          <th>เบอร์โทรศัพท์</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_array($result_show, MYSQLI_ASSOC)) {?>
                        <tr>
                          <td><?php echo $row['subject_name'];?></td>
                          <td><?php echo $row['branch_name'];?></td>
                          <td><?php echo $row['member_fullname'];?></td>
                          <td><?php echo 'วัน'.$row['teacher_schedule_date'].' '.'เวลา'.$row['teacher_schedule_starttime'].' '.'ถึง'.' '.$row['teacher_schedule_endtime'];?></td>
                          <td>0976742843</td>
                          <td>
                            <a href="detailclass2.php?check_id=<?php echo $row['teacher_schedule_id'];?>"><button type="button" class="btn btn-outline-info">รายละเอียดวิชา</button></a>
                            
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
            </form>
          </div>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      
      <div class="modal-body">
      <form action="addlearn.php" method="post">
      <div class="card-body">
      <div class="form-group">
            <label for="exampleSelectBorder">วิชา</label>
            <select class="custom-select form-control-border" id="exampleSelectBorder"  name="subject[]">
              <?php while($row = mysqli_fetch_array($result_subject, MYSQLI_ASSOC)) {?>
              <option><?php echo $row['subject_name']; ?></option>
              <?php } ?>
            </select>
          </div>
            <div class="form-group">
            <label for="exampleSelectBorder">สาขา</label>
            <select class="custom-select form-control-border" id="exampleSelectBorder" name="major[]"  onchange="showUser(this.value)">
              <?php while($row = mysqli_fetch_array($result_major, MYSQLI_ASSOC)) {?>
              <option><?php echo $row['branch_name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group" id="txtHint">
           
          </div>
              <div class="form-group">
              <label for="exampleSelectBorder">วันที่สอน</label>
              <select class="custom-select form-control-border" id="exampleSelectBorder" name="day[]">
              <option>จันทร์</option>
              <option>อังคาร</option>
              <option>พุธ</option>
              <option>พฤหัสบดี</option>
              <option>ศุกร์</option>
              <option>เสาร์</option>
              <option>อาทิตย์</option>
              </select>
              </div>
              <div class="form-group">
            <label for="exampleSelectBorder">เวลา</label>
            <select class="custom-select col-12" id="exampleSelectBorder" name="sttime[]">
              <option></option>
              <option>00:00:00</option>
              <option>00:30:00</option>
              <option>01:00:00</option>
              <option>01:30:00</option>
              <option>02:00:00</option>
              <option>02:30:00</option>
              <option>03:00:00</option>
              <option>03:30:00</option>
              <option>04:00:00</option>
              <option>04:30:00</option>
              <option>05:00:00</option>
              <option>05:30:00</option>
              <option>06:00:00</option>
              <option>06:30:00</option>
              <option>07:00:00</option>
              <option>07:30:00</option>
              <option>08:00:00</option>
              <option>08:30:00</option>
              <option>09:00:00</option>
              <option>09:30:00</option>
              <option>10:00:00</option>
              <option>10:30:00</option>
              <option>11:00:00</option>
              <option>11:30:00</option>
              <option>12:00:00</option>
              <option>12:30:00</option>
              <option>13:00:00</option>
              <option>13:30:00</option>
              <option>14:00:00</option>
              <option>14:30:00</option>
              <option>15:00:00</option>
              <option>15:30:00</option>
              <option>16:00:00</option>
              <option>16:30:00</option>
              <option>17:00:00</option>
              <option>17:30:00</option>
              <option>18:00:00</option>
              <option>18:30:00</option>
              <option>19:00:00</option>
              <option>19:30:00</option>
              <option>20:00:00</option>
              <option>20:30:00</option>
              <option>21:00:00</option>
              <option>21:30:00</option>
              <option>22:00:00</option>
              <option>22:30:00</option>
              <option>23:00:00</option>
              <option>23:30:00</option>
              <option>24:00:00</option>
            </select> ถึง
            <select class="custom-select col-12 " id="exampleSelectBorder" name="endtime[]">
            <option></option>
              <option>00:00:00</option>
              <option>00:30:00</option>
              <option>01:00:00</option>
              <option>01:30:00</option>
              <option>02:00:00</option>
              <option>02:30:00</option>
              <option>03:00:00</option>
              <option>03:30:00</option>
              <option>04:00:00</option>
              <option>04:30:00</option>
              <option>05:00:00</option>
              <option>05:30:00</option>
              <option>06:00:00</option>
              <option>06:30:00</option>
              <option>07:00:00</option>
              <option>07:30:00</option>
              <option>08:00:00</option>
              <option>08:30:00</option>
              <option>09:00:00</option>
              <option>09:30:00</option>
              <option>10:00:00</option>
              <option>10:30:00</option>
              <option>11:00:00</option>
              <option>11:30:00</option>
              <option>12:00:00</option>
              <option>12:30:00</option>
              <option>13:00:00</option>
              <option>13:30:00</option>
              <option>14:00:00</option>
              <option>14:30:00</option>
              <option>15:00:00</option>
              <option>15:30:00</option>
              <option>16:00:00</option>
              <option>16:30:00</option>
              <option>17:00:00</option>
              <option>17:30:00</option>
              <option>18:00:00</option>
              <option>18:30:00</option>
              <option>19:00:00</option>
              <option>19:30:00</option>
              <option>20:00:00</option>
              <option>20:30:00</option>
              <option>21:00:00</option>
              <option>21:30:00</option>
              <option>22:00:00</option>
              <option>22:30:00</option>
              <option>23:00:00</option>
              <option>23:30:00</option>
              <option>24:00:00</option>
            </select>
          </div>
              <div class="modal-footer justify-content-between">
      <button type="reset" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</button>
      <button type="submit" class="btn btn-outline-success" name="add_class">ยืนยัน</button>
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

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

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
