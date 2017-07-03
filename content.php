<?php

include "/config/koneksi.php";
include "/config/library.php";
include "/config/fungsi.php";
include "/config/fungsi_indotgl.php";


// Apabila modul tidak ditemukan
if(empty($_GET['menu'])){
	echo "<meta http-equiv='refresh' content='1;url=?menu=home'>";
  }
// Bagian Menu home
elseif($_GET['menu']=="home" ){
  	include "menu/menu_home.php";		
  }
// Bagian Menu Profil
elseif($_GET['menu']=="profil" ){
  	include "menu/menu_profil.php";		
  }
// Bagian Menu Profil
elseif($_GET['menu']=="tata_cara" ){
  	include "menu/menu_tata_cara.php";		
  }  
// Bagian Menu Biodata siswa
elseif($_GET['menu']=="biodata" ){
  	include "menu/menu_biodata.php";		
  }
// Bagian Menu Rapot siswa
elseif($_GET['menu']=="rapot" ){
  	include "menu/menu_rapot.php";		
  }
 // Bagian Menu Nilai siswa
elseif($_GET['menu']=="nilai" ){
  	include "menu/menu_nilai.php";		
  }     
// Bagian Menu logout
elseif($_GET['menu']=="login" ){
  	include "menu/menu_login.php";		
  }
 // Bagian Menu guru
elseif($_GET['menu']=="guru" ){
  	include "menu/menu_guru.php";		
  } 
// Bagian Menu detail guru
elseif($_GET['menu']=="detail_guru" ){
  	include "menu/menu_detail_guru.php";		
  } 

  
// Bagian Menu logout
elseif($_GET['menu']=="logout" ){
  	include "menu/menu_logout.php";		
  }


// Apabila tidak dituliskan tetapi tidak terdapat
else{
  echo "<p><b>Menu tidak dapat diakses</b></p>";
  echo "<meta http-equiv='refresh' content='1;url=?menu=home'>";
  }
  


?>
