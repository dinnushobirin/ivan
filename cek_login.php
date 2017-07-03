<?php
include "/config/koneksi.php";
//echo "$_POST[nis] | $_POST[password]";

$login		=mysql_query("SELECT * FROM siswa WHERE nis='$_POST[nis]' AND password_siswa='$_POST[password]'");
$ketemu		=mysql_num_rows($login);
$r			=mysql_fetch_array($login);

// Apabila username 
if ($ketemu > 0){
  session_start();
  

  $_SESSION['nis'] 			= $r['nis'];
  $_SESSION['nama_lengkap'] = $r['nama_lengkap'];
  header('location:index.php?menu=rapot');
}
else{
	echo "<script>alert('Login gagal! username & password tidak benar')</script>";
	echo "<script language=javascript>window.history.go(-1);</script>";
  exit;
}
?>
