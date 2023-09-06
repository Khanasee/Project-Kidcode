<?php
session_start();
  require('../condb.php');
  $id = $_GET["id"];
  $mj = "SELECT * FROM branch";
  $result_mj = mysqli_query($conn, $mj);
  $sql = "SELECT *  FROM student AS d1
          INNER JOIN branch AS d2
          ON  d1.student_branch = d2.branch_id
          WHERE student_id = '$id'";
          $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result)){
    $photo = $row['student_photo'];
    $user =  $row['student_user'];
    $password = $row['student_password'];
    $surname = $row['student_fullname'];
    $nickname = $row['student_nic'];
    $date = date('d/m/y',strtotime($row['student_birth']));
    $prsurname = $row['student_parents'];
    $line = $row['student_line'];
    $face = $row['student_facebook'];
    $tel = $row['student_tel'];
    $email = $row['student_email'];
    $member = $row['credit_by'];
    $sttime = date('d/m/y',strtotime($row['credit_date']));
    $major = $row['branch_name'];
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
  <title>รายละเอียดนักเรียน</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
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
          <div class="col-sm-3">
            <h1 class="m-0">รายละเอียดนักเรียน</h1><br>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="updatestudentdata.php?edit=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $row["id"];?>" name="id">
              <div class="card-body">
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="username" class="form-control col-sm-0" id="username" placeholder="" name="user" value="<?php echo $user;?>">
                </div>
                <div class="form-group">
                  <label for="surname">ชื่อ-นามสกุล</label>
                  <input type="surname" class="form-control col-sm-12" id="surname" placeholder="" name="surname" value="<?php echo $surname;?>">
                </div>
                <div class="form-group">
                  <label for="name">ชื่อเล่น</label>
                  <input type="text" class="form-control col-sm-12" id="nickname" placeholder="" name="nickname" value="<?php echo $nickname;?>" >
                </div>
                <div class="form-group">
                  <label for="date">วัน/เดือน/ปีเกิด</label>
                  <input type="text" class="form-control col-sm-12" id="data" placeholder="" name="date" value="<?php echo $date;?>">
                </div>

                <div class="form-group">
                   <label for="exampleInputFile">รูปภาพ</label>
                  <div class="image">
                  <img src="<?php echo $photo;?>"id="imgAvatar" height="150px" width="150px">
                  </div>
                  <div class="input-group">
                  <div class="custom-file" >
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="image" OnChange="showPreview(this)" >
                  <label class="custom-file-label" for="exampleInputFile"></label>
                  </div>
                  </div>
                  </div>
                <div class="form-group">
                  <label for="parentsurname">ชื่อ-นามสกุลผู้ปกครอง</label>
                  <input type="parentsurname" class="form-control col-sm-12" id="parentsurname" placeholder="" name="parentsurname" value="<?php echo $prsurname;?>" >
                </div>
                
                <div class="form-group row">
                    <label for="line" class="col-xs-6 col-form-label">line</label>
                    <div class="col-sm-12">
                      <input type="line" class="form-control" id="line" placeholder="" name="line" value="<?php echo $line;?>">
                    </div>  
                </div>
                <div class="form-group row">
                  <label for="face" class="col-xs-6 col-form-label">facebook</label>
                  <div class="col-sm-12">
                    <input type="face" class="form-control" id="face" placeholder="" name="face" value="<?php echo $face;?>">
                  </div>  
              </div>
                <div class="form-group row">
                    <label for="tel" class="col-xs-6 col-form-label">เบอร์โทรศัพท์</label>
                    <div class="col-sm-12">
                      <input type="tel" class="form-control" id="tel" placeholder="" name="tel" value="<?php echo $tel;?>">
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="email" class=" col-form-label">E-mail</label>
                    <div class="col-sm-12">
                      <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?php echo $email;?>">
                    </div>  
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">สาขา</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="major[]" >
                    <option><?php echo $major;?></option>
                    <?php while($row = mysqli_fetch_array($result_mj, MYSQLI_ASSOC)){?>
                    <option><?php echo $row['branch_name'];?></option>
                    <?php }?>
                  </select>
                </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label>เรียนวิชา</label>
                  <select class="select2" multiple="multiple" data-placeholder="<?php $sql = ("SELECT * FROM class_schedule WHERE class_schedule_student = '$id'");
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                              $subject = $row['class_schedule_subject'];
                              $sql2 = ("SELECT * FROM subject WHERE subject_id = '$subject'");
                              $result2 = mysqli_query($conn, $sql2);
                              while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                echo $row2['subject_name']." ";
                              }
                              }?>" style="width: 100%;" name="classname" value="">
                    <option>grivit</option>
                  </select>
                </div>
                <div class="form-group row">
                    <label for="member" class="col-xs-6 col-form-label">ID ผู้เพิ่มข้อมูล</label>
                    <div class="col-sm-12">
                      <input type="member" class="form-control" id="member" placeholder="" name="member"  value="<?php echo $member;?>" disable>
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="text" class="col-xs-6 col-form-label">วันที่สมัคร</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="time" placeholder="" name="astime" value="<?php echo $sttime;?>" disable>
                    </div>  
                </div>
                <div align="right">
            
              <button type="submit" class="btn btn-outline-success" name="update_student">อัปเดต</button>
            </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
    
  </div>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
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
