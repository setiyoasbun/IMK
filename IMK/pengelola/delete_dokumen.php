<?php
	include_once("../conn.php");
	$idt = $_GET['id_dokumen'];
	//echo $idt;
	$res = "SELECT isi_dokumen from dokumen where id_dokumen = '$idt'";
	$sult = mysqli_query($conn, $res);
	$go = mysqli_fetch_assoc($sult);
	echo $go['isi_dokumen'];
	if (!unlink($go['isi_dokumen']))
	{
	  echo "<script>alert('Gagal Menghapus Dokumen')</script>";
	}
	else
	{
		$res2 = "DELETE from dokumen where id_dokumen = '$idt'";
		mysqli_query($conn, $res2);
		echo "<script>alert('Berhasil Menghapus Dokumen')</script>";
	}
	header("location: kelola_dokumen.php");
?>