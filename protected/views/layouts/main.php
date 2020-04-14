<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PERISAI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!--<link rel="stylesheet" href="<?php // echo Yii::app()->theme->baseUrl; ?>/dist/css/ionicons.min.css">-->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/font.css" rel="stylesheet">
  
    <!-- jQuery -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/moment/moment.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/demo.js"></script>
  
  <script type="text/javascript"> 
    function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
    var x = new Date().toLocaleString('id-ID', { timeZone: 'Asia/Jakarta' })
    document.getElementById('ct').innerHTML = x+ " WIB";
    display_c();
    }

    function deleteConfirmation() {
      return confirm("Anda Yakin mau menghapus data ini ?");
    }
   </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed" onload=display_ct();>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        Welcome to Perisai, Pelaporan Aktivitas Karantina Mandiri!
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <div id="ct">test</div>  
      </li>     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo Yii::app()->request->baseUrl; ?>" class="brand-link">
      <img src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PERISAI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/img/32689.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php 
            $explode1=explode("php?r=",$_SERVER['REQUEST_URI']);
            $halaman=explode("/",$explode1[1]); 
            $class_menu_dashboard="nav-link";
            $class_menu_profil="nav-link";
            $class_menu_faskes="nav-link";
            $class_menu_odp="nav-link";
            if($halaman[0]=="site"){
                $active_page="Dashboard";
                $class_menu_dashboard="nav-link active";
            }
            else if($halaman[0]=="profil"){
                $active_page="Profil";
                $class_menu_profil="nav-link active";
            }
            else if($halaman[0]=="faskes"){
                $active_page="Faskes";
                $class_menu_faskes="nav-link active";
            }
            else{
                $active_page="Orang Dalam Pengawasan";
                $class_menu_odp="nav-link active";
            }
      ?> 
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header"><!--EXAMPLES--></li>
          <li class="nav-item">
            <a href="<?php echo Yii::app()->controller->createUrl('site/dashboard')?>" class="<?php echo $class_menu_dashboard; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--<span class="badge badge-info right">2</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo Yii::app()->controller->createUrl('profil/index')?>" class="<?php echo $class_menu_profil; ?>">
              <i class="nav-icon far fa-image"></i>
              <p>
                Profil
                <!--<span class="badge badge-info right">2</span>-->
              </p>
            </a>
          </li>
          <?php if($_SESSION['role']==2){?>
          <li class="nav-item">
            <a href="<?php echo Yii::app()->controller->createUrl('faskes/all')?>" class="<?php echo $class_menu_faskes; ?>">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Faskes
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?php echo Yii::app()->controller->createUrl('odp/index')?>" class="<?php echo $class_menu_odp; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                ODP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo Yii::app()->controller->createUrl('site/logout')?>" class="nav-link">
              <i class="nav-icon far"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $active_page; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $active_page; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $_SESSION['selesai'];?><sup style="font-size: 20px">orang</sup></h3>

                <p>Selesai Masa Karantina</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people-outline"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $_SESSION['odp'];?><sup style="font-size: 20px">orang</sup></h3>

                <p>Orang Dalam Pengawasan (ODP)</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo Yii::app()->controller->createUrl('odp/index')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $_SESSION['pdp'];?><sup style="font-size: 20px">orang</sup></h3>

                <p>Pasien Dalam Pengawasan (PDP)</p>
              </div>
              <div class="icon">
                <i class="ion ion-medkit"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo $content; ?> 
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
      <strong>Copyright &copy; MOLTI Kelompok 3</strong>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>


<?php //} ?>
</body>
</html>
