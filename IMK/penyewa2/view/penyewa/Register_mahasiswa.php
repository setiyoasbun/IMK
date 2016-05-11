<?php
	session_start();
	include_once("../../../conn.php");
	if(isset($_POST['Name'])){
		$nama = $_POST['Name'];
		$nrp = $_POST['NRP'];
		$email = $_POST['Email'];
		$pwd = $_POST['Password'];
		$sts = 'Mahasiswa';
		$asal = $_POST['Asal'];
		$check_email = "SELECT email_user from user WHERE email_user='$email'";
		$check_nrp = "SELECT nomor_id from user WHERE nomor_id='$nrp'";
		$count = mysqli_query($conn, $check_email);
		$count2 = mysqli_query($conn, $check_nrp);
		if(mysqli_num_rows($count)==0 && mysqli_num_rows($count2)==0){
			if(!$nama || !$nrp || !$email || !$pwd || !$asal){
				echo "<script>alert('Lengkapi semua form!')</script>";
			}
			else{
				$insert = ("INSERT INTO user (nama_user,nomor_id,email_user,password_user,status_user,asal_user)
							VALUE ('$nama','$nrp','$email','$pwd','$sts','$asal')");
				$inserts = mysqli_query($conn, $insert);
				if($insert){
					echo "<script type='text/javascript'>";
					echo "alert('Registrasi sukses');";
					echo "window.location.href = 'login.php';";
					echo "</script>";
				}
				else{
					echo "<script>alert('Registrasi gagal')</script>";
				}
			}
		}
		else{
			echo "<script>alert('Email atau NRP sudah dipakai')</script>";
		}
	}
	
?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Register | OneGate ITS</title>

  <link rel="apple-touch-icon" href="../../../assets/images/fav.png">
  <link rel="shortcut icon" href="../../../assets/images/fav.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../../assets/css/site.min.css">

  <link rel="stylesheet" href="../../../assets/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../../../assets/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../../../assets/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../../../assets/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../../../assets/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../../../assets/vendor/flag-icon-css/flag-icon.css">


  <!-- Page -->
  <link rel="stylesheet" href="../../../assets/css/pages/register.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="../../../assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../../../assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!--[if lt IE 9]>
    <script src="../../assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../../assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../../../assets/vendor/modernizr/modernizr.js"></script>
  <script src="../../../assets/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-login layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="brand">
		<b>R E G I S T E R</b>
      </div>
      <p>Anda mahasiswa ITS dan tidak punya akun? Register disini!</p>
      <form method="POST" action="">
	    <div class="form-group">
          <label class="sr-only" for="inputName">Nama</label>
          <input type="name" class="form-control" name="Name"
          placeholder="Nama">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputNRP">NRP</label>
          <input type="text" class="form-control" name="NRP" placeholder="NRP">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputEmail">Email</label>
          <input type="email" class="form-control" name="Email" placeholder="Email">
        </div>		
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" name="Password"
          placeholder="Password">
        </div>
		<div class="form-group">
          <label class="sr-only" for="inputAsal">Jurusan</label>
          <input type="text" class="form-control" name="Asal" placeholder="Jurusan">
        </div>		
        <!--<div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline pull-left">
            <input type="checkbox" id="inputCheckbox" name="checkbox">
            <label for="inputCheckbox">Ingat saya</label>
          </div>
          <!--<a class="pull-right" href="forgot-password.html">Lupa password?</a>-->
        <!--</div>-->
        <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
      </form>
      <!--<p>Masih belum memiliki akun? Silakan untuk <a href="register.html">Daftar</a></p>-->

      <!--
	  <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Pemberitahuan!</strong> Anda gagal login.
        </div>
	   -->

      <footer class="page-copyright">
        <p>WEBSITE BY OneGate ITS</p>
        <p>© 2015. <a href="../../../user/index.php">OneGate ITS</a>.</p>
        <!--<div class="social">
          <a href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-dribbble" aria-hidden="true"></i>
          </a>
        </div>-->
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="../../assets/vendor/jquery/jquery.js"></script>
  <script src="../../assets/vendor/bootstrap/bootstrap.js"></script>
  <script src="../../assets/vendor/animsition/jquery.animsition.js"></script>
  <script src="../../assets/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="../../assets/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../../assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="../../assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

  <!-- Plugins -->
  <script src="../../assets/vendor/switchery/switchery.min.js"></script>
  <script src="../../assets/vendor/intro-js/intro.js"></script>
  <script src="../../assets/vendor/screenfull/screenfull.js"></script>
  <script src="../../assets/vendor/slidepanel/jquery-slidePanel.js"></script>

  <script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

  <!-- Scripts -->
  <script src="../../assets/js/core.js"></script>
  <script src="../../assets/js/site.js"></script>

  <script src="../../assets/js/sections/menu.js"></script>
  <script src="../../assets/js/sections/menubar.js"></script>
  <script src="../../assets/js/sections/sidebar.js"></script>

  <script src="../../assets/js/configs/config-colors.js"></script>
  <script src="../../assets/js/configs/config-tour.js"></script>

  <script src="../../assets/js/components/asscrollable.js"></script>
  <script src="../../assets/js/components/animsition.js"></script>
  <script src="../../assets/js/components/slidepanel.js"></script>
  <script src="../../assets/js/components/switchery.js"></script>
  <script src="../../assets/js/components/jquery-placeholder.js"></script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

</body>

</html>