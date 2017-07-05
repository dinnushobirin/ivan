<?php
/*
include "/config/koneksi.php";
include "/config/library.php";
include "/config/fungsi.php";
include "/config/fungsi_indotgl.php";
include "/config/class_paging.php";
*/

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
  // Bagian Menu admin
elseif($_GET['menu']=="admin" ){
  	include "menu/menu_admin.php";		
  }

// Bagian Menu kecamatan
elseif($_GET['menu']=="kecamatan" ){
  	include "menu/menu_kecamatan.php";		
  }

// Bagian Menu kelurahan
elseif($_GET['menu']=="kelurahan" ){
  	include "menu/menu_kelurahan.php";		
  }
  
// Bagian Menu pengerajin
elseif($_GET['menu']=="pengerajin" ){
  	include "menu/menu_pengerajin.php";		
  }
  
  // Bagian Menu kerajinan
elseif($_GET['menu']=="kerajinan" ){
  	include "menu/menu_kerajinan.php";		
  }
  
// Bagian Menu kategori
elseif($_GET['menu']=="kategori" ){
  	include "menu/menu_kategori.php";		
  }
  
  // Bagian Menu siswa
elseif($_GET['menu']=="siswa" ){
  	include "menu/menu_siswa.php";		
  }
  
  // Bagian Menu Masuk Kelas
elseif($_GET['menu']=="masuk_kelas" ){
  	include "menu/menu_masuk_kelas.php";		
  }
  
  // Bagian Menu Kelas
elseif($_GET['menu']=="kelas" ){
  	include "menu/menu_kelas.php";		
  }
  
  // Bagian Menu mapel
elseif($_GET['menu']=="mapel" ){
  	include "menu/menu_mapel.php";		
  }
  
  // Bagian Menu semester tahun
elseif($_GET['menu']=="semester_tahun" ){
  	include "menu/menu_semester_tahun.php";		
  }
  
    // Bagian Menu Nilai
elseif($_GET['menu']=="nilai" ){
  	include "menu/menu_nilai.php";		
  }
  
  // Bagian Menu Detail Nilai
elseif($_GET['menu']=="detail_nilai" ){
  	include "menu/menu_detail_nilai.php";		
  }
  
  // Bagian Menu Detail Nilai
elseif($_GET['menu']=="cetak_nilai" ){
  	include "menu/menu_cetak_nilai.php";		
  }
  
  // Bagian Menu Detail Nilai
elseif($_GET['menu']=="cetak_catatan" ){
  	include "menu/menu_cetak_catatan.php";		
  }
  
  // Bagian Menu Cetak Biodata Siswa
elseif($_GET['menu']=="cetak_biodata_siswa" ){
  	include "menu/menu_cetak_biodata_siswa.php";		
  }
  
  // Bagian Menu Cetak Cover Siswa
elseif($_GET['menu']=="cetak_cover_siswa" ){
  	include "menu/menu_cetak_cover_siswa.php";		
  }
  
  


// Apabila tidak dituliskan tetapi tidak terdapat
else{
  echo "<p><b>Menu tidak dapat diakses</b></p>";
  echo "<meta http-equiv='refresh' content='1;url=?menu=home'>";
  }
  


?>
