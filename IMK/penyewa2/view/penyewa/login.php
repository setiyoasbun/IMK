<?php
	session_start();
	include_once("../../../conn.php");
	
	if(isset($_POST['login'])){
		$id = $_POST['ID'];
		$pass = $_POST['Password'];
		//$remember = $_POST['checkboxs'];
		//var_dump($remember);
		$res = "SELECT * from user where nomor_id = '$id' AND password_user = '$pass'";
		$sult = mysqli_query($conn, $res);
		$row = mysqli_fetch_array($sult,MYSQLI_ASSOC);
		if(mysqli_num_rows($sult)>0){
			$_SESSION['id'] = $row['id_user'];
			//$_SESSION['username'] = $row['nama_user'];
			if(isset($_POST['checkboxs'])){
				setcookie('id',$id,time()+60*60*7);
			}
			//var_dump($_SESSION['id']);
			if($row['status_user'] == 'Akademisi'){
				header('location:../../../pengelola/index.php');
			}
		}
		else{
			echo "<script>alert('Maaf, Username atau Password anda salah')</script>";
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

  <title>Login Member | OneGate ITS</title>

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
  <link rel="stylesheet" href="../../../assets/css/pages/login.css">

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
        <h2 class="brand-text">Masuk Member</h2>
      </div>
      <p>Silakan masuk untuk melanjutkan ke halaman utama</p>
      <form method="post" action="">
	    <!--<div class="form-group">
          <label class="sr-only" for="inputName">Nama</label>
          <input type="name" class="form-control" name="Name"
          placeholder="Nama">
        </div>-->
        <div class="form-group">
          <label class="sr-only" for="inputName">NRP/NIP/ID Lain</label>
          <input type="text" class="form-control" id="ID" name="ID" placeholder="NRP/NIP/No.Identitas Lain">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" name="Password" placeholder="Password" onkeypress="capLock(event)">
		  <div id="divMayus" style="visibility:hidden">Caps Lock is on.</div> 
        </div>				
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline pull-left">
            <input type="checkbox" id="inputCheckbox" name="checkboxs" value="1">
            <label for="inputCheckbox">Remember Username</label>
          </div>
          <!--<a class="pull-right" href="forgot-password.html">Lupa password?</a>-->
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
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
  <?php
	if(isset($_COOKIE['id'])){
		$ids = $_COOKIE['id'];
		echo "<script> document.getElementById('ID').value = '$ids'</script>";
	}
  ?>


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
  <script>
	function capLock(e){
	 kc = e.keyCode?e.keyCode:e.which;
	 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
	 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
	  document.getElementById('divMayus').style.visibility = 'visible';
	 else
	  document.getElementById('divMayus').style.visibility = 'hidden';
	}
  </script>

</body>

</html>