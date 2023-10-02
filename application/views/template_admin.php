
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Awass</title>
  <link rel="icon" href="<?=base_url()?>assets/template/dist/img/AdminLTELogo.png" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/template/dist/css/adminlte.min.css">
  <script type="text/javascript"> 
    function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
      var x = new Date()
      var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
      x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
      document.getElementById('ct').innerHTML = x1;
      display_c();
    }
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload=display_ct();>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>assets/template/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('auth/logout/') ?>" class="nav-link">Logout</a> 
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <span class="nav-link" id='ct' ></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>assets/template/index3.html" class="brand-link">
      <img src="<?=base_url()?>assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Awass</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= htmlentities($current_user->nama) ?></a>
          <a><em><small><?= htmlentities($current_user->username) ?></em></small></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Periode/') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Periode Pengawasan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Jadwal/') ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Pengawasan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Pengadilan/') ?>" class="nav-link">
              <i class="nav-icon far fa-solid fa-building"></i>
              <p>
                Daftar Pengadilan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Area/') ?>" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Area Pengawasan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Subarea/') ?>" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
               Sub-Area Pengawasan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Tim/') ?>" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Tim Pengawas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/Instrumen/') ?>" class="nav-link">
              <i class="nav-icon far fa-comment-dots"></i>
              <p>
                Instrumen Pengawasan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Superadmin/User/') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Daftar User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
   <?= $contents ?>
 </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>


$(document).ready(function() { 
    var table = $('#example1').DataTable({
        "lengthChange": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
    } );
 
    table.buttons().container().appendTo( '#example1_wrapper .col-md-6:eq(0)' );
} );

  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  // });

  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }

</script>
</body>
</html>
