<?php
include "../config/koneksi.php";


$login		=mysql_query("SELECT * FROM guru WHERE nip='$_POST[username]' AND password='$_POST[password]'");
$ketemu		=mysql_num_rows($login);
$r			=mysql_fetch_array($login);

// Apabila username 
if ($ketemu > 0){
  session_start();
  

  $_SESSION['guru'] 		= $r['nama_guru'];
  $_SESSION['nip'] 			= $r['nip'];
  header('location:tampil.php?menu=home');
}
else{
	echo "<script>alert('Login gagal! username & password tidak benar')</script>";
	echo "<script language=javascript>window.history.go(-1);</script>";
  exit;
}
?>
