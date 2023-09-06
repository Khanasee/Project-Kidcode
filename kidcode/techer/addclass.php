<?php
  session_start();
  require('../condb.php');
  if(isset($_REQUEST['edit_id'])){
   $id = $_REQUEST['edit_id'];
   $show = ("SELECT *  FROM teacher_schedule AS d1
            INNER JOIN member AS d2
            ON  d1.teacher_schedule_name = d2.member_id
            INNER JOIN branch AS d3
            ON d1.teacher_schedule_branch=d3.branch_id
            INNER JOIN subject AS d4
            ON d1.teacher_schedule_subject=d4.subject_id WHERE teacher_schedule_id = '$id'");
  $result_show = mysqli_query($conn, $show);
  $sql = ("SELECT * FROM member WHERE member_rank = 's' OR member_rank = 't'");
  $result = mysqli_query($conn, $sql);
  $sql2 = ("SELECT * FROM branch");
  $result2 = mysqli_query($conn ,$sql2);
  }
  if (!isset($_SESSION['tech_username'])) {
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
  <title>ตารางวิชา</title>

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





  <!-- Content Wrapper. Contains page content  เนื้อหา-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <h1 class="m-0">ตารางวิชา</h1><br>
        </div><!-- /.row -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="editclass.php?edit_id=<?php echo $id?>" method="post">
            <?php while($row = mysqli_fetch_array($result_show, MYSQLI_ASSOC)) {?>
            <div class="card-body">
            <div class="form-group">
              <label for="numberclass">รหัสรายวิชา</label>
              <input type="numberclass" class="form-control col-sm-0" id="numberclass" placeholder="" disabled name="numberclass" value="<?php echo	$row['teacher_schedule_subject']; ?>">
            </div>
            <div class="form-group">
              <label for="nameclass">ชื่อวิชา</label>
              <input type="nameclass" class="form-control col-sm-0" id="nameclass" placeholder="" disabled name="nameclass" value="<?php echo	$row['subject_name']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleSelectBorder">สาขา</label>
            <input type="nameclass" class="form-control col-sm-0" id="nameclass" placeholder="" disabled name="nameclass" value="<?php echo $row['branch_name'];  ?>">
         
          </div>
          <div class="form-group">
            <label for="exampleSelectBorder">อาจารย์ผู้สอน</label>
            <select class="custom-select form-control-border" disabled id="exampleSelectBorder" name="member[]">
              <option><?php echo	$row['member_fullname']; ?></option>
              <?php $brid = $row['branch_id'];
              $sel_add = "SELECT * FROM member INNER JOIN branch ON branch_onwer = member_id WHERE branch_id = '$brid'";
              $result_add = mysqli_query($conn, $sel_add);
              $sel_tech = "SELECT * FROM member WHERE member_branch = '$brid'";
              $result_tech = mysqli_query($conn, $sel_tech);
              while($row4 = mysqli_fetch_array($result_add, MYSQLI_ASSOC)){?>
              <option><?php echo	$row4['member_fullname']; ?></option>
             <?php }?>
             <?php while($row4 = mysqli_fetch_array($result_tech, MYSQLI_ASSOC)){?>
              <option><?php echo	$row4['member_fullname']; ?></option>
             <?php }?>
            </select>
          </div>
            <div class="form-group">
                <label for="cost">จำนวนครั้งคอร์ส</label>
                <input type="text" class="form-control" id="cost" disabled placeholder="" name="cost" value="<?php echo $row['subject_number']; ?>">
              </div>
            <div class="form-group">
              <label for="nameclass">ราคาทั้งคอร์ส(บาท)</label>
              <input type="nameclass" class="form-control col-sm-0" disabled id="nameclass" placeholder="" disabled name="nameclass" value="<?php echo $row['subject_full_amount']; ?>">
            </div>
            <div class="form-group">
              <label for="nameclass">ราคาต่อเดือน(บาท)</label>
              <input type="nameclass" class="form-control col-sm-0" disabled id="nameclass" placeholder="" disabled name="nameclass" value="<?php echo $row['subject_amount']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleSelectBorder">เวลา</label>
            <select class="custom-select col-12" id="exampleSelectBorder" disabled name="sttime[]" >
              <option><?php echo $row['teacher_schedule_starttime']; ?></option>
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
            <select class="custom-select col-12 " disabled id="exampleSelectBorder" name="endtime[]">
            <option><?php echo $row['teacher_schedule_endtime']; ?></option>
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
              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>รายละเอียดวิชา</label>
                    <textarea class="form-control" rows="3" disabled placeholder="<?php echo $row['subject_detail'];?>" name="text"></textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer">
              <div class="col-md-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 100%;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>บทที่</th>
                          <th>เรียน</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $subject_id = $row['subject_id'];
                      $sel_chapter = "SELECT * FROM detail_subject WHERE subject_id = '$subject_id'";
                      $result_chapter = mysqli_query($conn, $sel_chapter);
                      while($row = mysqli_fetch_array($result_chapter, MYSQLI_ASSOC)){?>
                        <tr>
                        
                          <td><input type="text" class="form-control" id="price" placeholder="" disabled name="num_chapter[]" value="<?php echo $row['chapter_num'];?>"></td>
                          <td><input type="text" class="form-control" id="price" placeholder="" disabled name="chapter[]" value="<?php echo $row['chapter'];?>"></td>
                        
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
             
    <?php }?>
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
