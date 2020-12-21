<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- datepicker -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- select -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/select2/dist/css/select2.min.css">

  <!--  -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/main.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico'); ?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini <?php if($menu == 'item' || $menu == 'sale'){echo"sidebar-collapse";} ?>">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('dashboard'); ?>/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">unchu</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">PT. UNCHU MULTI INDONESIA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets'); ?>/image/users/<?= $this->fungsi->user_login()['image'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->fungsi->user_login()['username'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets'); ?>/image/users/<?= $this->fungsi->user_login()['image'] ?>" class="img-circle" alt="User Image">
                <p>
                  <?= $this->fungsi->user_login()['name'] ?>
                  <small><?= $this->fungsi->user_login()['address'] ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-logout">
                    Log out
                  </button>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets'); ?>/image/users/<?= $this->fungsi->user_login()['image'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->fungsi->user_login()['name'] ?></p>
          <small><?php if($this->fungsi->user_login()['level'] == 1){echo "Admin";}else {echo "Kasir";} ?></small>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU APLIKASI</li>
        <li class="<?php if($menu == 'dashboard')echo 'active'; ?>">
          <a href="<?= base_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?php if($menu == 'category' || $menu == 'unit' || $menu == 'item')echo 'active'; ?>">
          <a href="#">
            <i class="fa fa-check-square"></i>
            <span>Persetujuan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="<?php if($menu == 'category')echo 'active'; ?>"><a href="<?= base_url('category'); ?>"><i class="fa fa-money"></i> Kwitansi</a></li>
            <li  class="<?php if($menu == 'draft_pengeluaran')echo 'active'; ?>"><a href="<?= base_url('draft_pengeluaran'); ?>"><i class="fa fa-arrow-left"></i> Draft Pengeluaran</a></li>
            <li  class="<?php if($menu == 'hutang')echo 'active'; ?>"><a href="<?= base_url('hutang'); ?>"><i class="fa fa-tags"></i> Hutang</a></li>
            <li  class="<?php if($menu == 'surat')echo 'active'; ?>"><a href="<?= base_url('surat'); ?>"><i class="fa fa-envelope"></i> Surat</a></li>
            <li  class="<?php if($menu == 'kunci_pemasukan')echo 'active'; ?>"><a href="<?= base_url('kunci_pemasukan'); ?>"><i class="fa fa-shield"></i> Kunci Pemasukan</a></li>
            <li  class="<?php if($menu == 'persetujuan_spk')echo 'active'; ?>"><a href="<?= base_url('persetujuan_spk'); ?>"><i class="fa fa-calendar-check-o"></i> Persetujuan SPK</a></li>
            <li  class="<?php if($menu == 'pembayaran_kontraktor')echo 'active'; ?>"><a href="<?= base_url('pembayaran_kontraktor'); ?>"><i class="fa fa-modx"></i> Pembayaran Kontraktor</a></li>
          </ul>
         </li>
          
          <li class="<?php if($menu == 'konsumen')echo 'active'; ?>"> 
            <a href="<?= base_url('konsumen'); ?>">
              <i class="fa fa-users"></i> <span>Konsumen</span>
            </a>
          </li>

          <li class="<?php if($menu == 'transaksi')echo 'active'; ?>"> 
            <a href="<?= base_url('transaksi'); ?>">
              <i class="fa fa-opencart"></i> <span>Transaksi</span>
            </a>
          </li>


          <li class="treeview <?php if($menu == 'category' || $menu == 'unit' || $menu == 'item')echo 'active'; ?>">
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="<?php if($menu == 'lap_keuangan')echo 'active'; ?>"><a href="<?= base_url('lap_keuangan'); ?>"><i class="fa fa-money"></i> Keuangan</a></li>
            <li  class="<?php if($menu == 'lap_konsumen')echo 'active'; ?>"><a href="<?= base_url('lap_konsumen'); ?>"><i class="fa fa-users"></i> Konsumen</a></li>
            <li  class="<?php if($menu == 'lap_proyek')echo 'active'; ?>"><a href="<?= base_url('lap_proyek'); ?>"><i class="fa fa-building-o"></i> Proyek</a></li>
            <li  class="<?php if($menu == 'lap_marketing')echo 'active'; ?>"><a href="<?= base_url('lap_marketing'); ?>"><i class="fa fa-bullhorn"></i> Marketing</a></li>
            <li  class="<?php if($menu == 'lap_transaksi')echo 'active'; ?>"><a href="<?= base_url('lap_transaksi'); ?>"><i class="fa fa-opencart"></i> Transaksi</a></li>
          </ul>
         </li>
        
        <?php if ($this->fungsi->user_login()['level'] == "1"):?>
        <li class="header">SETTINGS</li>
        <li class="treeview <?php if($menu == 'category' || $menu == 'unit' || $menu == 'item')echo 'active'; ?>">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="<?php if($menu == 's_profile_perusahaan')echo 'active'; ?>"><a href="<?= base_url('s_profile_perusahaan'); ?>"><i class="fa fa-suitcase"></i> Profile Perusahaan</a></li>
            <li  class="<?php if($menu == 's_perumahan')echo 'active'; ?>"><a href="<?= base_url('s_perumahan'); ?>"><i class="fa fa-home"></i> Perumahan</a></li>
            <li  class="<?php if($menu == 's_konsumen')echo 'active'; ?>"><a href="<?= base_url('s_konsumen'); ?>"><i class="fa fa-users"></i> Konsumen</a></li>
            <li  class="<?php if($menu == 's_pengguna')echo 'active'; ?>"><a href="<?= base_url('s_pengguna'); ?>"><i class="fa fa-user-plus"></i> Pengguna</a></li>
            <li  class="<?php if($menu == 's_persetujuan')echo 'active'; ?>"><a href="<?= base_url('s_persetujuan'); ?>"><i class="fa fa-check-circle"></i> Persetujuan</a></li>
            <li  class="<?php if($menu == 's_email')echo 'active'; ?>"><a href="<?= base_url('s_email'); ?>"><i class="fa fa-envelope"></i> Email</a></li>
            <li  class="<?php if($menu == 's_surat')echo 'active'; ?>"><a href="<?= base_url('s_surat'); ?>"><i class="fa fa-newspaper-o"></i> Surat</a></li>
            <li  class="<?php if($menu == 's_keuangan')echo 'active'; ?>"><a href="<?= base_url('s_keuangan'); ?>"><i class="fa fa-money"></i> Keuangan</a></li>
            <li  class="<?php if($menu == 's_bakcupdb')echo 'active'; ?>"><a href="<?= base_url('s_bakcupdb'); ?>"><i class="fa fa-database"></i> Backup Database</a></li>
            <li  class="<?php if($menu == 's_bank')echo 'active'; ?>"><a href="<?= base_url('s_bank'); ?>"><i class="fa fa-university"></i> Bank</a></li>
          </ul>
         </li>

        <li class="<?php if($menu == 'user')echo 'active'; ?>">
          <a href="<?= base_url('user'); ?>">
            <i class="fa fa-user"></i> <span>Users</span>
          </a>
        </li>
        <li class="<?php if($menu == 'setting')echo 'active'; ?>">
          <a href="<?= base_url('user/setting'); ?>">
            <i class="fa fa-wrench"></i> <span>Setting</span>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Auto numeric -->
<script src="<?= base_url('assets'); ?>/bower_components/jquery/autoNumeric/autoNumeric.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php $this->load->view($content) ?>
  </div>
  
  <!-- Modal -->

  <div class="modal fade" id="modal-logout">
    <div class="modal-dialog lebar-25">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Yakin ingin keluar?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Keluar</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a>Zainal Mutaqin</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets'); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets'); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- Select2 -->
<script src="<?= base_url('assets'); ?>/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?= base_url('assets'); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>

<script>
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })


  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script>
  $(document).ready(function () {
    $('#table1').dataTable({
      "iDisplayLength": 5,
      "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
      "pagingType": "full_numbers",
      "language": {
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecords": "Data tidak ada",
              "info": "Tampilkan halaman _PAGE_ dari _PAGES_",
              "infoEmpty": "Tidak ada data ditemukan",
              "infoFiltered": "(filtered from _MAX_ total records)",
              "search": "Cari",
              "paginate": {
                  "first":      "Awal",
                  "last":       "Akhir",
                  "next":       "&raquo;",
                  "previous":   "&laquo;"
              },
      },
      "columnDefs": [
            {
                "targets": [0],
                "orderable": false
            }
        ],
    })
  });
</script>
</body>
</html>
