<?php
	session_start();
	include_once("../conn.php");
	if(!(isset($_SESSION['id']))){
		header("location: ../penyewa2/view/penyewa/login.php");
	}
	if(isset($_FILES['upload'])){
	  $ids = $_SESSION['id'];
      $errors= array();
      $file_name = $_FILES['upload']['name'];
      $file_size =$_FILES['upload']['size'];
      $file_tmp =$_FILES['upload']['tmp_name'];
      $file_type=$_FILES['upload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['upload']['name'])));
      
      $expensions= array("doc","docx","pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../file/".$file_name);
		 $link = "../file/".$file_name;
         //echo "<script>alert('Sukses mengupload file')</script>";
		 $res = "INSERT into dokumen (id_user, isi_dokumen) values ('$ids','$link')";
		 if(mysqli_query($conn, $res)){
			 echo "<script>alert('Sukses mengupload file')</script>";
		 }
		 else echo "<script>alert('Gagal mengupload file')</script>";
		 
      }else{
         echo "<script>alert('File bukan berupa doc, docx, atau pdf.')</script>";
      }
	}
	
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
    <link rel="stylesheet" href="../https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
                  <img src="dist/img/UPTBAHASA.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Nama UPT</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/UPTBAHASA.jpg" class="img-circle" alt="User Image">
                    <p>
                      Nama UPT
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
              <img src="dist/img/UPTBAHASA.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Nama UPT</p>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
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
                <i class="fa fa-envelope"></i> <span>Keluhan</span><span class="label label-primary pull-right">4</span>
              </a>
            </li>
            <li>
              <a href="forum.php">
                <i class="fa fa-edit"></i> <span>Forum</span>
              </a>
            </li>
            <li class="active">
              <a href="kelola_dokumen.php">
                <i class="fa fa-book"></i> <span>Kelola Dokumen</span>
              </a>
            </li>
            <li>
              <a href="kelola_informasi.php">
                <i class="fa fa-laptop"></i> <span>Kelola Informasi</span>
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
            Kelola Dokumen
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Keluhan</h3>
                  <form action="" method="post" enctype="multipart/form-data">
					  Select document to upload:
					  <input type="file" name="upload" id="fileToUpload">
					  <input type="submit" value="Upload" name="submit">
				  </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Dokumen</th>
                        <th>Pengupload</th>
                        <th>Tanggal Diunggah</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tr>
						<?php
							$res2 = "SELECT * from dokumen";
							$sult2 = mysqli_query($conn, $res);
							foreach($sult2 as $dok){
						?>
                        <td><?php echo  ?></td>
                        <td>UPT Bahasa</td>
                        <td>12-02-2016</td>
                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#myModal">Hapus</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi</h4>
                              </div>
                              <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus Dokumen ini?</p>
                              </div>
                              <div class="modal-footer">
                                <a href="#" type="button" class="btn btn-default" data-dismiss="modal">Yes</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              </div>
                            </div>
                            
                          </div>
                        </td>
                    </tr>
                    <tfoot>
                      <tr>
                        <th>Dokumen</th>
                        <th>Pengupload</th>
                        <th>Tanggal Diunggah</th>
                        <th>Opsi</th>
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
