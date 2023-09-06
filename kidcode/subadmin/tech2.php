<?php
  require('../condb.php');
  if(isset($_REQUEST['show_id'])){
    $id = $_REQUEST['show_id'];
    $sql = ("SELECT * FROM member WHERE member_id = '$id'");
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $photo = $row['member_photo'];
      $user = $row['member_user'];
      $mem_id = $row['member_id'];
      $mem_nick = $row['member_nickname'];
      $mem_full = $row['member_fullname'];
      $mem_idcode = $row['member_id_card_code'];
      $mem_birth = date('d/m/y',strtotime($row['member_birth']));
      $tel = $row['member_tel'];
      $line = $row['member_line'];
      $facebook = $row['member_facebook'];
      $email = $row['member_email'];
      $st = date('d/m/y',strtotime($row['member_stdate']));
      $majorid = $row['member_branch'];
    }
    $sql2 = ("SELECT * FROM branch WHERE branch_id = '$majorid'");
    $result2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
      $major = $row2['branch_name'];
    }

    $select_major = ("SELECT * FROM branch");
    $result_major = mysqli_query($conn, $select_major);


  }
  session_start();
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
  <title>รายละเอียดอาจารย์</title>

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
            <h1 class="m-0">รายละเอียดอาจารย์</h1><br>
        </div><!-- /.row -->
        <div class="card card-primary">
            <form action="edittech.php?edit=<?php echo $id;?>" method="post">
              <div class="card-body">
              <div class="form-group">
                  <div class="image">
                    <div align="center">
                  <img src="<?php echo $photo; ?>" id="imgAvatar" height="150px" width="150px">
                  </div>
                  </div>
                  </div>
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="username" class="form-control col-sm-0" id="username1" placeholder=""  value="<?php echo $user; ?>" name="username">
                </div>
                  <div class="form-group">
                    <label for="address">ชื่อเล่น</label>
                    <input type="address" class="form-control col-sm-12" id="address1" placeholder=""  value="<?php echo $mem_nick; ?>" name="nickname">
                  </div>
                  <div class="form-group">
                    <label for="address">ชื่อ-นามสกุล</label>
                    <input type="address" class="form-control col-sm-12" id="address1" placeholder=""  value="<?php echo $mem_full; ?>" name="fullname">
                  </div>
                <div class="form-group">
                    <label for="kidpass">รหัสบัตรประชาชน</label>
                    <input type="kidpass" class="form-control" id="kidpass1" placeholder="" disabled value="<?php echo $mem_idcode; ?>">
                  </div>
                  <div class="form-group">
                    <label for="kidpass">วันเดือนปีเกิด</label>
                    <input type="kidpass" class="form-control" id="kidpass1" placeholder="" disabled value="<?php echo $mem_birth; ?>">
                  </div>
                <div class="form-group row">
                    <label for="tel" class="col-xs-6 col-form-label">เบอร์โทรศัพท์ </label>
                    <div class="col-sm-12">
                      <input type="tel" class="form-control" id="tel" placeholder="" name="tel"  value="<?php echo $tel; ?>">
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="line" class="col-xs-6 col-form-label">line</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="line" placeholder="" name="line"  value="<?php echo $line; ?>">
                    </div>  
                </div>
                <div class="form-group row">
                  <label for="facebook" class="col-xs-6 col-form-label">facebook</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="facebook" placeholder="" name="facebook"  value="<?php echo $facebook; ?>">
                  </div>  
              </div>
              
                <div class="form-group row">
                    <label for="email" class=" col-form-label">E-mail</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="email" placeholder="" name="email"  value="<?php echo $email; ?>">
                    </div>  
                </div>
                <div class="form-group">
                      <label for="exampleSelectBorder">ประจำสาขา</label>
                      <select class="custom-select form-control-border" id="exampleSelectBorder" name="major[]">
                        <option value=""><?php echo $major;?></option>
                        <?php while($row3 = mysqli_fetch_array($result_major, MYSQLI_ASSOC)){?>
                        <option value="<?php echo $row3['branch_id'];?>"><?php echo $row3['branch_name'];?></option>
                        <?php }?>
                      </select>
                </div>
              <div class="form-group row">
                <label for="startdate" class="col-xs-6 col-form-label">วันที่สมัคร</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="startdate" placeholder="" name="startdate" disabled value="<?php echo $st ?>">
              </div>  
          </div>
          
          
              <div align="right">
        
                   <button type="submit" class="btn btn-outline-success" data-dismiss="modal" name="edit_tc">ยืนยัน</button>
                   
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
