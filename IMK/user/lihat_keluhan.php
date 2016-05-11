<?php
	session_start();
	include_once("../conn.php");
	if(!(isset($_SESSION['id']))){
		header("location: ../penyewa2/view/penyewa/login.php");
	}
	$idk=$_GET['id_keluhan'];
	$id = $_SESSION['id'];
	if(isset($_POST['submit'])){
		
		$isi = $_POST['submit'];
		
		//$tipe = "Fasor";
		$res = "INSERT INTO jawaban (id_user, id_keluhan, isi_jawaban) values ('$id', '$idk', '$isi')";
		//$sult = mysqli_query($conn, $res);
		if(mysqli_query($conn, $res)){
			echo "<script>alert('Berhasil memasukkan comment')</script>";
			$res1 = "UPDATE keluhan SET status_keluhan = 1 where id_keluhan = '$idk'";
			$sult1 = mysqli_query($conn, $res1);
			header("location:keluhan.php");
		}
		else{
			echo "<script>alert('Gagal memasukkan comment')</script>";
		}
	}
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
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
                <i class="fa fa-envelope"></i> <span>Keluhan</span><span class="label label-primary pull-right"><?php echo $hitung[0]; ?></span>
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
              <a href="kelola_dokumen.php">
                <i class="fa fa-book"></i> <span>Kelola Dokumen</span>
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
            <a href="keluhan.php" class="btn btn-primary pull-left"><b>Back To Keluhan</b></a>
            Jawab Keluhan
          </h1>
        </section>
        <section class="content">
          <div class="box box-widget">
                <div class='box-header with-border'>
                  <div class='user-block'>
					<?php
						$res2 = "SELECT * from keluhan where id_keluhan = '$idk'";
						$sult2 = mysqli_query($conn, $res2);
						$go2 = mysqli_fetch_assoc($sult2);
						$idu = $go2['id_user'];
						$res3 = "SELECT nama_user from user where id_user = '$idu'";
						$sult3 = mysqli_query($conn, $res3);
						$go3 = mysqli_fetch_assoc($sult3);
					?>
                    <img class='img-circle' src='../dist/img/UPTBAHASA.jpg' alt='user image'>
                    <span class='username'><?php echo"<a href=profile.php?id_user=$idu>".$go3['nama_user']."</a>"; ?></span>
                    <span class='description'><?php echo $go2['tgl_keluhan']; ?></span>
                  </div><!-- /.user-block -->
                  </div><!-- /.box-header -->
                <div class='box-body'>
                  <!-- post text -->
                  <p><?php echo $go2['isi_keluhan']; ?></p>

                  <span class='pull-right text-muted'>Answered</span>
                </div><!-- /.box-body -->
                <div class='box-footer box-comments'>
                  <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='../dist/img/UPTBAHASA.jpg' alt='user image'>
                    <div class='comment-text'>
                      <span class="username">
                        UPT Bahasa
                        <span class='text-muted pull-right'>11-02-2015 11:00</span>
                      </span><!-- /.username -->
                      Akan segera diperbaiki
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->
                  </div>
              </div><!-- /.box -->
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
