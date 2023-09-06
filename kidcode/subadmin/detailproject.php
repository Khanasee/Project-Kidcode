<?php
  session_start();
  require('../condb.php');
  if(isset($_GET['detail_id'])){
    $id = $_GET['detail_id'];

    $sql = "SELECT * FROM class_schedule WHERE class_schedule_id = '$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $subject = $row['class_schedule_subject'];
      $student = $row['class_schedule_student'];
      $major = $row['class_schedule_branch'];
    }

    $sql2 = "SELECT * FROM subject WHERE subject_id = '$subject'";
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
      $subject_name = $row['subject_name'];
    }

    $sql3 = "SELECT * FROM student WHERE student_id = '$student'";
    $result3 = mysqli_query($conn,$sql3);
    while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
      $student_name = $row['student_fullname'];
    }

    
    $sql4 = "SELECT * FROM portfolio WHERE portfolio_student ='$student' AND portfolio_subject = '$subject'";
    $result4 = mysqli_query($conn, $sql4);
  }
  $r = 1;
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
  <title>ข้อมูลสรุปผลการเรียน</title>

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
  




  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <h1>รายละเอียดผลงานนักเรียน</h1><br>
      </div><!-- /.row -->
      <div class="card card-primary">
          <div class="card-header">
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="numclass">รหัสวิชา</label>
                <input type="numclass" disabled class="form-control col-sm-12" id="numclass"  placeholder="" name="numclass" value="<?php echo $subject;?>">
              </div>
              <div class="form-group">
                <label for="nameclass">ชื่อวิชา</label>
                <input type="nameclass" disabled class="form-control col-sm-12" id="nameclass" placeholder="" name="nameclass" value="<?php echo $subject_name;?>">
              </div>
              <div class="form-group">
                <label for="name">ชื่อนักเรียน</label>
                <input type="name" disabled class="form-control col-sm-12" id="name" placeholder="" name="name" value="<?php echo $student_name;?>">
              </div>
              <div class="card-footer">
              <div class="col-md-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 100%;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>จำนวนครั้ง</th>
                          <th>วันที่</th>
                          <th>เรียนบทที่</th>
                          <th>ไฟล์</th>
                          <th>ความคิดเห็นของอาจารย์</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
                          ?>
                        <tr>
                          <td><?php echo $r++;?></td>
                          <td><?php echo date('d/m/y',strtotime($row['portfolio_date']));?></td>
                          <td><?php $cp = $row['portfolio_chapter'];
                              $sel_chap = "SELECT * FROM detail_subject WHERE chapter_num = '$cp' AND subject_id = '$subject'";
                              $result_sel_chap = mysqli_query($conn , $sel_chap);
                            while($row2 = mysqli_fetch_array($result_sel_chap, MYSQLI_ASSOC)){
                              echo $row2['chapter'];
                            }
                          ?></td>
                          <td><div class="form-group row">
                              <div class="col-sm-12">
                              <a href="<?php echo $row['portfolio_files'];?>" download><button type="button" class="btn btn-outline-info" >ดาวน์โหลด</button></a>
                             </div>  
                          </div></td>
                          <td> <textarea class="form-control" rows="1" placeholder="<?php echo $row['portfolio_comment'];?>" name="text"></textarea></td>
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
            <div align="right">
            
              <button type="submit" class="btn btn-outline-success" name="add_major">ยืนยัน</button>
            </div>
          </form>
        </div>
    </div><!-- /.container-fluid -->
    
  </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
</div>    
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
