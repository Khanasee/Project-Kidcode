<?php
require("inc/function.php");
require("./checkid.php");
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- include Css File-->
    <?php include("inc/css_inc.php"); ?>
  <style>
    .btn-app{
      padding: 10px 5px;
      min-width: 60px;
      height: 55px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini ">
<div class="wrapper">

  <!-- Main Header -->
 <?php include("top.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("left.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                LIST
                <small>Data</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
         
          <div class="card-body">
          
              <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Sname</th>
                  <th>Age</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Sname</th>
                  <th>Age</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
 <?php include("foot.php"); ?>
  <!-- Control Sidebar -->
  <?php include("sidebar.php"); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- include Js File -->
    <?PHP include("inc/js_inc.php") ?>
<script>
$(function () {
$('#example1').DataTable({
    "Processing": true,
    "ServerSide": true,
    "responsive": true, 
    "scrollX": true,
    "ajax" : './inc_list_table.php',
    "order" : [[0, "desc"]],
    "aLengthMenu" : [[15,25, 50, 75], [15, 25, 50, 75]],
    "iDisplayLength" : 15,
    'columnDefs': [
      {  'width': '10%','className': 'text-left', 'targets': 0 },
      {  'width': '20%','className': 'text-left', 'targets': 1 ,},
      {  'width': '20%','className': 'text-center', 'targets': 2 },
      {  'width': '20%','className': 'text-center', 'targets': 3, 'orderable': false },
      {  'width': '30%','className': 'text-center', 'targets': 4, 'orderable': false }
    ],
    
  });
 })
</script>
<script >
$(document).ready(function() {
    $('.nav-link').on('click', function(){
    setTimeout(function(){
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        }, 0);
});
} );
</script>
</body>
</html>