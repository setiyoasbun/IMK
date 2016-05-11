<?php
  session_start();
  include_once("../conn.php");
  if(!(isset($_SESSION['id']))){
    header("location: ../penyewa2/view/penyewa/login.php");
  }
  $tipe = "Fasor";
  $id = $_SESSION['id'];
  if(isset($_POST['submit'])){
    
    $judul = $_POST['title'];
    $isi = $_POST['ask'];
    
    $res = "INSERT INTO thread (id_user, judul_thread, isi_thread, tipe_thread) values ('$id', '$judul', '$isi', '$tipe')";
    //$sult = mysqli_query($conn, $res);
    if(mysqli_query($conn, $res)){
      echo "<script>alert('Berhasil memasukkan thread')</script>";
    }
    else{
      echo "<script>alert('Gagal memasukkan thread')</script>";
    }
  }
  $res2 = "SELECT * FROM thread where tipe_thread='$tipe' order by id_thread DESC";
  $sult2 = mysqli_query($conn, $res2);
  $na = "SELECT nama_user from user where id_user = '$id'";
  $ma = mysqli_query($conn, $na);
  $nama = mysqli_fetch_assoc($ma);
  $hi = "SELECT COUNT(*) FROM keluhan where status_keluhan = 0";
  $tung = mysqli_query($conn, $hi);
  $hitung = mysqli_fetch_array($tung);
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
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
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
            <li>
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            <li>
              <a href="keluhan.php">
                <i class="fa fa-envelope"></i> <span>Keluhan</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forum</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="forum_upt.php"><i class="fa fa-circle-o"></i>UPT Bahasa</a></li>
                <li class="active"><a href="forum_fasor.php"><i class="fa fa-circle-o"></i> UPT Fasor</a></li>
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
          <h1 style="text-align: center">
            Forum UPT Fasor
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Forum</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
        <form method="POST" action="">
          <div class="form-group">
              <label>Judul Thread</label>
              <input type="text" class="form-control" placeholder="Judul Thread..." name="title">
          </div>
          <div class="form-group">
              <label>Isi Thread</label>
              <textarea class="form-control" rows="3" placeholder="Ketik disini..." name="ask"></textarea>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit"><b>Post</b></button>
        </form>
                <br></br>  
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Nama Pembuat</th>
                        <th>Tanggal Post</th>
                        <th>Komentar</th>
                      </tr>
                    </thead>
          <?php
            foreach($sult2 as $thread){
              echo"<tr>";
              echo"<td><a href=thread.php?id_forum=".$thread['id_thread'].">".$thread['judul_thread']."</a></td>";
              $ids = $thread['id_user'];
              $res3 = "SELECT nama_user FROM user where id_user = '$ids'";
              $sult3 = mysqli_query($conn, $res3);
              $go = mysqli_fetch_assoc($sult3);
              echo"<td><a href=orang_lain.php?id_user=$ids>".$go['nama_user']."</a></td>";
              echo "<td>";
              echo $thread['tgl_thread'];
              echo "</td>";
              $idx = $thread['id_thread'];
              $res4 = "SELECT COUNT(*) from comment where id_thread = '$idx'";
              $sult4 = mysqli_query($conn, $res4);
              $go2 = mysqli_fetch_array($sult4);
              echo "<td>";
              echo $go2[0];
              echo "</td>";
            }
          ?>
                    
                    <tfoot>
                      <tr>
                        <th>Judul</th>
                        <th>Nama Pembuat</th>
                        <th>Tanggal Post</th>
                        <th>Komentar</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
