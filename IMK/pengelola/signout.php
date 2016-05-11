<?php
session_start();
session_destroy();
echo "<script>alert('Telah Logout')</script>";
header("Location:../index.html");
?>