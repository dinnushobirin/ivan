<?php
include "../config/koneksi.php";


$login		=mysql_query("SELECT * FROM admin WHERE admin_username='$_POST[username]' AND admin_password='$_POST[password]'");
$ketemu		=mysql_num_rows($login);
$r			=mysql_fetch_array($login);

// Apabila username 
if ($ketemu > 0){
  session_start();
  

  $_SESSION['admin'] 		= $r['admin_username'];
  $_SESSION['admin_name'] 	= $r['admin_name'];
  $_SESSION['id_admin'] 	= $r['admin_id'];
  header('location:tampil.php?menu=home');
}
else{
	echo "<script>alert('Login gagal! username & password tidak benar')</script>";
	echo "<script language=javascript>window.history.go(-1);</script>";
  exit;
}
?>
