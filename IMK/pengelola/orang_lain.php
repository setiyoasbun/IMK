<?php
  session_start();
  if(!(isset($_SESSION['id']))){
    header("location: ../penyewa2/view/penyewa/login.php");
  }
  include_once("../conn.php");
  $id = $_SESSION['id'];
  $ido = $_GET['id_user'];
  $na = "SELECT nama_user from user where id_user = '$id'";
  $ma = mysqli_query($conn, $na);
  $nama = mysqli_fetch_assoc($ma);
  $na1 = "SELECT * from user where id_user = '$ido'";
  $ma1 = mysqli_query($conn, $na1);
  $nama1 = mysqli_fetch_assoc($ma1);
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>One-Gate ITS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>OG</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>One-Gate</b>ITS</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/UPTBAHASA.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $nama['nama_user']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/UPTBAHASA.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $nama['nama_user']; ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  <div class="pull-left">
                      <a href="diri.php" class="btn btn-default btn-flat">Edit Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/UPTBAHASA.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama['nama_user']; ?></p>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            <li>
              <a href="keluhan.php">
                <i class="fa fa-envelope"></i> <span>Keluhan</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forum</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="forum_upt.php"><i class="fa fa-circle-o"></i>UPT Bahasa</a></li>
                <li><a href="forum_fasor.php"><i class="fa fa-circle-o"></i> UPT Fasor</a></li>
                <li><a href="forum_upmb.php"><i class="fa fa-circle-o"></i> UPMB </a></li>
              </ul>
            </li>
            <li>
              <a href="unduh_dokumen.php">
                <i class="fa fa-book"></i> <span>Unduh Dokumen</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <a href="javascript:history.back()" class="btn btn-primary"><b>Back</b></a>
        </section>
        
        <section class="content">
          <div class="row">
            <div class="col-md-13">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../dist/img/UPTBAHASA.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $nama1['nama_user']; ?></h3>
                  <p class="text-muted text-center"><?php echo $nama1['email_user']; ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Nama User</b> <a class="pull-right"><?php echo $nama1['nama_user']; ?></a>
                    </li>          
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo $nama1['email_user']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Asal</b> <a class="pull-right"><?php echo $nama1['asal_user']; ?></a>
                    </li>           
                    <li class="list-group-item">
                      <b>Status</b> <a class="pull-right"><?php echo $nama1['status_user']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Nomor Identitas</b> <a class="pull-right"><?php echo $nama1['nomor_id']; ?></a>
                    </li>       
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
