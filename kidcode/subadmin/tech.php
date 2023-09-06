<?php
  session_start();
  require('../condb.php');
  $id = $_SESSION['sub_id'];
  $sql = ("SELECT * FROM branch WHERE branch_onwer = '$id'");
  $result = mysqli_query($conn, $sql);

  $sql2 = ("SELECT * FROM branch WHERE branch_onwer = '$id'");
  $result2 = mysqli_query($conn, $sql);
if(!isset($_GET['get_id'])){
  $get="สาขาทั้งหมด";
  $sql1 = ("SELECT *  FROM member AS d1
            INNER JOIN branch AS d2
            ON  d1.member_branch = d2.branch_id AND member_rank = 't' AND branch_onwer = '$id'");
  $result1 = mysqli_query($conn, $sql1);
}

if(isset($_GET['get_id'])){
  $getid = $_GET['get_id'];
  $sel_ma = "SELECT * FROM branch WHERE branch_id = '$getid'";
  $result_ma = mysqli_query($conn, $sel_ma);
  while($row = mysqli_fetch_array($result_ma, MYSQLI_ASSOC)){
  $get=$row['branch_name'];
  }
  $sql1 = ("SELECT *  FROM member AS d1
            INNER JOIN branch AS d2
            ON  d1.member_branch = d2.branch_id AND member_rank = 't' AND member_branch = '$getid'");
  $result1 = mysqli_query($conn, $sql1);
}
  $errors = array();
  include('errors.php'); 
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
  <title>อาจารย์ผู้สอน</title>

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
              <h1>อาจารผู้สอน</h1>
            </div>
            <div class="col-sm-10">
              <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus">เพิ่มอาจารผู้สอน</i></button>
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
                          <th>ชื่อ - นามสกุล</th>
                          <th>สาขา</th>
                          <th>จังหวัด</th>
                          <th>เบอร์โทรศัพท์</th>
                          <th>line</th>
                          <th>facebook</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                        <tr>
                          <td><?php echo $row['member_fullname']; ?></td>
                          <td><?php echo $row['branch_name']; ?></td>
                          <td><?php echo $row['member_county']; ?></td>
                          <td><?php echo $row['member_tel']; ?></td>
                          <td><?php echo $row['member_line']; ?></td>
                          <td><?php echo $row['member_facebook']; ?></td>
                          <td><a href="tech2.php?show_id=<?php echo $row['member_id']; ?>"><button type="button" class="btn btn-outline-info">รายละเอียดอาจารย์</button></a>
                          <a href="deletetech.php?del_id=<?php echo $row['member_id']; ?>" class="btn btn-outline-danger"  onclick="return confirm('ต้องการลบอาจารย์คนนี้ไหม')">ลบข้อมูลอาจารย์</a></td>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มอาจารย์</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="addtech.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control col-sm-0" id="username" placeholder="" name="usernametech">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control col-sm-0" id="password" placeholder="" name="passwordtech">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control col-sm-0" id="password" placeholder="" name="passwordtech2">
          </div>
          <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="name" class="form-control col-sm-0" id="name" placeholder="" name="name">
          </div>
          <div class="form-group">
            <label for="lastname">นามสกุล</label>
            <input type="lastname" class="form-control col-sm-0" id="lastname" placeholder="" name="lastname">
          </div>
          <div class="form-group">
            <label for="lastname">ชื่อเล่น</label>
            <input type="lastname" class="form-control col-sm-0" id="lastname" placeholder="" name="nickname">
          </div>
          <div class="form-group">
              <label for="idcard">รหัสบัตรประชาชน</label>
              <input type="idcard" class="form-control" id="idcard" placeholder="" name="idcard">
            </div>
            <div class="form-group">
              <label for="date">วันเดือนปีเกิด</label>
              <input type="date" class="form-control" id="date" placeholder="" name="date">
            </div>
            <div class="form-group">
            <label for="provi">จังหวัด</label>
              <select name="province[]" input type="text" class="form-control col-sm-12" id="provi" name="provi" ><div class="form-group">
                  <option value="" selected>--------- เลือกจังหวัด ---------</option>
                  <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                  <option value="กระบี่">กระบี่ </option>
                  <option value="กาญจนบุรี">กาญจนบุรี </option>
                  <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                  <option value="กำแพงเพชร">กำแพงเพชร </option>
                  <option value="ขอนแก่น">ขอนแก่น</option>
                  <option value="จันทบุรี">จันทบุรี</option>
                  <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                  <option value="ชัยนาท">ชัยนาท </option>
                  <option value="ชัยภูมิ">ชัยภูมิ </option>
                  <option value="ชุมพร">ชุมพร </option>
                  <option value="ชลบุรี">ชลบุรี </option>
                  <option value="เชียงใหม่">เชียงใหม่ </option>
                  <option value="เชียงราย">เชียงราย </option>
                  <option value="ตรัง">ตรัง </option>
                  <option value="ตราด">ตราด </option>
                  <option value="ตาก">ตาก </option>
                  <option value="นครนายก">นครนายก </option>
                  <option value="นครปฐม">นครปฐม </option>
                  <option value="นครพนม">นครพนม </option>
                  <option value="นครราชสีมา">นครราชสีมา </option>
                  <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                  <option value="นครสวรรค์">นครสวรรค์ </option>
                  <option value="นราธิวาส">นราธิวาส </option>
                  <option value="น่าน">น่าน </option>
                  <option value="นนทบุรี">นนทบุรี </option>
                  <option value="บึงกาฬ">บึงกาฬ</option>
                  <option value="บุรีรัมย์">บุรีรัมย์</option>
                  <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                  <option value="ปทุมธานี">ปทุมธานี </option>
                  <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                  <option value="ปัตตานี">ปัตตานี </option>
                  <option value="พะเยา">พะเยา </option>
                  <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                  <option value="พังงา">พังงา </option>
                  <option value="พิจิตร">พิจิตร </option>
                  <option value="พิษณุโลก">พิษณุโลก </option>
                  <option value="เพชรบุรี">เพชรบุรี </option>
                  <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                  <option value="แพร่">แพร่ </option>
                  <option value="พัทลุง">พัทลุง </option>
                  <option value="ภูเก็ต">ภูเก็ต </option>
                  <option value="มหาสารคาม">มหาสารคาม </option>
                  <option value="มุกดาหาร">มุกดาหาร </option>
                  <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                  <option value="ยโสธร">ยโสธร </option>
                  <option value="ยะลา">ยะลา </option>
                  <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                  <option value="ระนอง">ระนอง </option>
                  <option value="ระยอง">ระยอง </option>
                  <option value="ราชบุรี">ราชบุรี</option>
                  <option value="ลพบุรี">ลพบุรี </option>
                  <option value="ลำปาง">ลำปาง </option>
                  <option value="ลำพูน">ลำพูน </option>
                  <option value="เลย">เลย </option>
                  <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                  <option value="สกลนคร">สกลนคร</option>
                  <option value="สงขลา">สงขลา </option>
                  <option value="สมุทรสาคร">สมุทรสาคร </option>
                  <option value="สมุทรปราการ">สมุทรปราการ </option>
                  <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                  <option value="สระแก้ว">สระแก้ว </option>
                  <option value="สระบุรี">สระบุรี </option>
                  <option value="สิงห์บุรี">สิงห์บุรี </option>
                  <option value="สุโขทัย">สุโขทัย </option>
                  <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                  <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                  <option value="สุรินทร์">สุรินทร์ </option>
                  <option value="สตูล">สตูล </option>
                  <option value="หนองคาย">หนองคาย </option>
                  <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                  <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                  <option value="อุดรธานี">อุดรธานี </option>
                  <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                  <option value="อุทัยธานี">อุทัยธานี </option>
                  <option value="อุบลราชธานี">อุบลราชธานี</option>
                  <option value="อ่างทอง">อ่างทอง </option>
                  <option value="อื่นๆ">อื่นๆ</option>
            </select>
            <div class="form-group">
                   <label for="exampleInputFile">รูปภาพ</label>
                  <div class="image">
                  <img id="imgAvatar" height="150px" width="150px">
                  </div>
                  <div class="input-group">
                  <div class="custom-file" >
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="image" OnChange="showPreview(this)" >
                  <label class="custom-file-label" for="exampleInputFile"></label>
                  </div>
                  </div>
                  </div>
          <div class="form-group row">
              <label for="tel" class="col-xs-6 col-form-label">เบอร์โทรศัพท์ </label>
              <div class="col-sm-12">
                <input type="tel" class="form-control" id="tel" placeholder="" name="tel">
              </div>  
          </div>
          <div class="form-group row">
              <label for="line" class="col-xs-6 col-form-label">line</label>
              <div class="col-sm-12">
                <input type="line" class="form-control" id="line" placeholder="" name="line">
              </div> 
            </div>
            <div class="form-group row">
              <label for="facebook" class="col-xs-6 col-form-label">facebook</label>
              <div class="col-sm-12">
                <input type="facebook" class="form-control" id="facebook" placeholder="" name="facebook">
              </div>  
            </div>
          <div class="form-group row">
              <label for="email" class=" col-form-label">E-mail</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="" name="email">
              </div>  
          </div>
          <div class="form-group">
            <label for="exampleSelectBorder">สาขา</label>
            <select class="custom-select form-control-border" id="exampleSelectBorder" name="tech[]">
              <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
              <option><?php echo $row['branch_name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</button>
      <button type="submit" class="btn btn-outline-success" name="add_tech">ยืนยัน</button>
    </div>
</form>
    </div>
    </div><!-- /.container-fluid -->
  </div></div>
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
