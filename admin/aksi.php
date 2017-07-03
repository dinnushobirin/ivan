<?php
session_start();
include "../config/koneksi.php";
//include "../config/library.php";
include "../config/fungsi.php";
include "../config/fungsi_indotgl.php";

$menu=$_GET['menu'];

/*
if(empty($_SESSION['admin']) AND $_GET['menu']!="lupa_password"){
	echo "di luar hak akses anda :-). Mohon login sebagai Admin";
	  echo "<meta http-equiv='refresh'content='0;url=index.php'>";
}
*/


	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_ALL));





																//bagian hapus
// Menghapus data
if (isset($menu) AND $_GET['act']=='hapus'){
	//untuk menghapus data admin
	if($menu=="admin"){
		$hapus=mysql_query("DELETE FROM admin WHERE id_admin='$_GET[id]'");
  	}
	
	//untuk menghapus data guru
	elseif($menu=="guru"){		
		$hapus=mysql_query("DELETE FROM guru WHERE nip='$_GET[id]'");
  	}
	
	//untuk menghapus data siswa
	elseif($menu=="siswa"){		
		$ambil=mysql_query("SELECT * FROM nilai WHERE nis='$_GET[id]'");
		$hitung=mysql_num_rows($ambil);
		
		if(!empty($hitung)){
			 echo "<script>alert('HAPUS GAGAL')</script>";
			 echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=$menu'>";
			 exit;
		}
		
		
		$hapus=mysql_query("DELETE FROM siswa WHERE nis='$_GET[id]'");
  	}
	
	//untuk menghapus data kelas
	elseif($menu=="kelas"){		
		$hapus=mysql_query("DELETE FROM kelas WHERE id_kelas='$_GET[id]'");
  	}
	
	//untuk menghapus data semester tahun
	elseif($menu=="semester_tahun"){
		$hapus=mysql_query("DELETE FROM semester_tahun WHERE id_semester_tahun='$_GET[id]'");
  	}
	
	//untuk menghapus data mapel
	elseif($menu=="mapel"){
		$hapus=mysql_query("DELETE FROM mapel WHERE id_mapel='$_GET[id]'");
  	}
	
  
  if (!$hapus){
     echo "<script>alert('HAPUS GAGAL')</script>";
    }
  else{
     echo "<script>alert('Data Berhasil Di Hapus')</script>";
    }
     echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=$menu'>";
}
    	                                                        //end bagian hapus
																
	   	                                                        //bagian Profil Sekolahan
//untuk menu profil
elseif ($menu=='profil' ){
	//penulisan variabel2 yg dikirim
	$id_profil			= strip_tags($_POST['id_profil']);
	$nama_sekolah		= strip_tags($_POST['nama_sekolah']);
	$alamat_sekolah		= strip_tags($_POST['alamat_sekolah']);
	$visi_sekolah		= strip_tags($_POST['visi_sekolah']);
	$misi_sekolah		= strip_tags($_POST['misi_sekolah']);
	$catatan_sekolah	= strip_tags($_POST['catatan_sekolah']);
	$fax_sekolah		= strip_tags($_POST['fax_sekolah']);
	$email				= strip_tags($_POST['email']);
	$no_telepon			= strip_tags($_POST['no_telepon']);
	$website			= strip_tags($_POST['website']);
	$nama_kepsek		= strip_tags($_POST['nama_kepsek']);
	$nip_kepsek			= strip_tags($_POST['nip_kepsek']);
	
	define("UPLOAD_DIR", "../images/images_profil/");
	
																	//untuk insert tabel profil
	//untuk insert profil 
	if($_GET['act']=="tambah"){
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=profil'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		
		if (!empty($_FILES['myFile']['name'])) {
			gambar_upload(UPLOAD_DIR ,"0001","profil");
			$foto = "foto_sekolah		='profil_0001.jpg',";
		}
		else{
			$foto = "";
		}
		
		$update = mysql_query("UPDATE profil SET 
										nama_sekolah		='$nama_sekolah',
										alamat_sekolah		='$alamat_sekolah',
										visi_sekolah		='$visi_sekolah',
										misi_sekolah		='$misi_sekolah',
										catatan_sekolah		='$catatan_sekolah',
										$foto										
										fax_sekolah			='$fax_sekolah',
										email				='$email',
										no_telepon			='$no_telepon',
										website				='$website',
										nama_kepsek			='$nama_kepsek',
										nip_kepsek			='$nip_kepsek'
									WHERE id_profil			='0001'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=profil'>";
		
	}
	
}												
//end untuk menu profil

	   	                                                        //bagian admin
//untuk menu admin
elseif ($menu=='admin' ){
	//penulisan variabel2 yg dikirim
	$id_admin			= strip_tags($_POST['id_admin']);
	$admin_name			= strip_tags($_POST['admin_name']);
	$admin_email			= strip_tags($_POST['admin_email']);
	$username			= strip_tags($_POST['username']);
	$username1			= strip_tags($_POST['username1']);
	$password			= strip_tags($_POST['password']);
	
	
																	//untuk insert tabel bank
	//untuk insert tabel bank
	if($_GET['act']=="tambah"){
		
		validasi_ada("admin","admin_username","$username");
		//sql input database
		  $input = mysql_query("INSERT INTO admin (
                                                            admin_name,
                                                            admin_username,
                                                            admin_password,
                                                            admin_email)
                                            VALUES (
                                                            '$admin_name',
                                                            '$username',
                                                            '$password',
                                                            '$admin_email'
                                                            )");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=admin'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		if($username!==$username1){
			validasi_ada("admin","admin_username","$username");
		}
		
		$update = mysql_query("UPDATE admin SET 
                                                    admin_name			='$admin_name',
                                                    admin_username		='$username',
                                                    admin_password		='$password',
                                                    admin_email			='$admin_email'
                                            WHERE admin_id			='$id_admin'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=admin'>";
		
	}
	
}												
//end untuk menu admin

	   	                                                        //bagian guru
//untuk menu guru
elseif ($menu=='guru' ){
	//penulisan variabel2 yg dikirim
	$nip				= strip_tags($_POST['nip']);
	$nip1				= strip_tags($_POST['nip1']);
	$password			= strip_tags($_POST['password']);
	$nama_guru			= strip_tags($_POST['nama_guru']);
	$alamat				= strip_tags($_POST['alamat']);
	$jenis_kelamin		= strip_tags($_POST['jenis_kelamin']);
	$agama				= strip_tags($_POST['agama']);
	$tempat_lahir		= strip_tags($_POST['tempat_lahir']);
	$tanggal_lahir		= strip_tags(rubah_tgl($_POST['tanggal_lahir']));
	$no_tlpn			= strip_tags($_POST['no_telp']);
	
	
	define("UPLOAD_DIR", "../images/images_guru/");
	
	
																	//untuk insert tabel guru
	//untuk insert tabel guru
	if($_GET['act']=="tambah"){
		
		validasi_ada("guru","nip","$nip");
		
		gambar_upload(UPLOAD_DIR ,"$nip","guru");
		
		//sql input database
		  $input = mysql_query("INSERT INTO guru (
										nip,
										password,
										nama_guru,
										alamat,
										jenis_kelamin,
										agama,
										tempat_lahir,
										tanggal_lahir,
										no_telp,
										foto)
							 	VALUES (
										'$nip',
										'$password',
										'$nama_guru',
										'$alamat',
										'$jenis_kelamin',
										'$agama',
										'$tempat_lahir',
										'$tanggal_lahir',
										'$no_tlpn',
										'guru_$nip.jpg'
										)");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=guru'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		
		if (!empty($_FILES['myFile']['name'])) {
			gambar_upload(UPLOAD_DIR ,"$nip","guru");
			$foto = ",foto		='guru_$nip.jpg'";
		}
		else{
			$foto = "";
		}
				
		$update = mysql_query("UPDATE guru SET 
										nip					='$nip',
										password			='$password',
										nama_guru			='$nama_guru',
										alamat				='$alamat',
										jenis_kelamin		='$jenis_kelamin',
										agama				='$agama',
										tempat_lahir		='$tempat_lahir',
										tanggal_lahir		='$tanggal_lahir',
										no_telp				='$no_tlpn'
										$foto
									WHERE nip				='$nip'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=guru'>";
		
	}
	
}												
//end untuk menu guru


	   	                                                        //bagian siswa
//untuk menu siswa
elseif ($menu=='siswa' ){
	//penulisan variabel2 yg dikirim
	$nis				= strip_tags($_POST['nis']);
	$nis1				= strip_tags($_POST['nis1']);
	$nama_lengkap		= strip_tags($_POST['nama_lengkap']);
	$password_siswa		= strip_tags($_POST['password_siswa']);
	$jenis_kelamin		= strip_tags($_POST['jenis_kelamin']);
	$tempat_lahir		= strip_tags($_POST['tempat_lahir']);
	$tanggal_lahir		= strip_tags(rubah_tgl($_POST['tanggal_lahir']));
	$agama				= strip_tags($_POST['agama']);
	$anak_ke			= strip_tags($_POST['anak_ke']);
	$status_anak		= strip_tags($_POST['status_anak']);
	$alamat_siswa		= strip_tags($_POST['alamat_siswa']);
	$telepon_ortu		= strip_tags($_POST['telepon_ortu']);
	$terima_di_kelas	= strip_tags($_POST['terima_di_kelas']);
	$terima_pada_tanggal= strip_tags(rubah_tgl($_POST['terima_pada_tanggal']));
	$nama_sekolah_asal	= strip_tags($_POST['nama_sekolah_asal']);
	$alamat_sekolah_asal= strip_tags($_POST['alamat_sekolah_asal']);
	$nama_ayah			= strip_tags($_POST['nama_ayah']);
	$nama_ibu			= strip_tags($_POST['nama_ibu']);
	$pekerjaan_ayah		= strip_tags($_POST['pekerjaan_ayah']);
	$pekerjaan_ibu		= strip_tags($_POST['pekerjaan_ibu']);
	$alamat_ayah		= strip_tags($_POST['alamat_ayah']);
	$alamat_ibu			= strip_tags($_POST['alamat_ibu']);
	$nama_wali			= strip_tags($_POST['nama_wali']);
	$alamat_wali		= strip_tags($_POST['alamat_wali']);
	$telepon_wali		= strip_tags($_POST['telepon_wali']);
	$pekerjaan_wali		= strip_tags($_POST['pekerjaan_wali']);
	$tanggal_input		= $tgl_sekarang;
	
	
	define("UPLOAD_DIR", "../images/images_siswa/");
	
	
																	//untuk insert tabel siswa
	//untuk insert tabel siswa
	if($_GET['act']=="tambah"){
		
		gambar_upload(UPLOAD_DIR ,"$nis","siswa");
		validasi_ada("siswa","nis","$nis");
		
		//sql input database
		  $input = mysql_query("INSERT INTO siswa (
										nis,
										password_siswa,
										nama_lengkap,
										jenis_kelamin,
										tempat_lahir,
										tanggal_lahir,
										agama,
										anak_ke,
										status_anak,
										alamat_siswa,
										telepon_ortu,
										terima_di_kelas,
										terima_pada_tanggal,
										nama_sekolah_asal,
										alamat_sekolah_asal,
										nama_ayah,
										nama_ibu,
										pekerjaan_ayah,
										pekerjaan_ibu,
										alamat_ayah,
										alamat_ibu,
										nama_wali,
										alamat_wali,
										telepon_wali,
										pekerjaan_wali,
										foto,
										tanggal_input)
							 	VALUES (
										'$nis',
										'$password_siswa',
										'$nama_lengkap',
										'$jenis_kelamin',
										'$tempat_lahir',
										'$tanggal_lahir',
										'$agama',
										'$anak_ke',
										'$status_anak',
										'$alamat_siswa',
										'$telepon_ortu',
										'$terima_di_kelas',
										'$terima_pada_tanggal',
										'$nama_sekolah_asal',
										'$alamat_sekolah_asal',
										'$nama_ayah',
										'$nama_ibu',
										'$pekerjaan_ayah',
										'$pekerjaan_ibu',
										'$alamat_ayah',
										'$alamat_ibu',
										'$nama_wali',
										'$alamat_wali',
										'$telepon_wali',
										'$pekerjaan_wali',
										'siswa_$nis.jpg',
										'$tanggal_input'
										)");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=siswa'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		
		if (!empty($_FILES['myFile']['name'])) {
			gambar_upload(UPLOAD_DIR ,"$nis","siswa");
			$foto = "foto		='siswa_$nis.jpg',";
		}
		else{
			$foto = "";
		}
				
		$update = mysql_query("UPDATE siswa SET 
										nis					='$nis',
										password_siswa		='$password_siswa',
										nama_lengkap		='$nama_lengkap',
										jenis_kelamin		='$jenis_kelamin',
										tempat_lahir		='$tempat_lahir',
										tanggal_lahir		='$tanggal_lahir',
										agama				='$agama',
										anak_ke				='$anak_ke',
										status_anak			='$status_anak',
										alamat_siswa		='$alamat_siswa',
										telepon_ortu		='$telepon_ortu',
										terima_di_kelas		='$terima_di_kelas',
										terima_pada_tanggal	='$terima_pada_tanggal',
										nama_sekolah_asal	='$nama_sekolah_asal',
										alamat_sekolah_asal	='$alamat_sekolah_asal',
										nama_ayah			='$nama_ayah',
										nama_ibu			='$nama_ibu',
										pekerjaan_ayah		='$pekerjaan_ayah',
										pekerjaan_ibu		='$pekerjaan_ibu',
										alamat_ayah			='$alamat_ayah',
										alamat_ibu			='$alamat_ibu',
										nama_wali			='$nama_wali',
										alamat_wali			='$alamat_wali',
										telepon_wali		='$telepon_wali',
										pekerjaan_wali		='$pekerjaan_wali',
										$foto				
										tanggal_input		='$tanggal_input'
									WHERE nis				='$nis1'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=siswa'>";
		
	}
	
}												
//end untuk menu siswa

	   	                                                        //bagian kelas
//untuk menu kelas
elseif ($menu=='kelas' ){
	//penulisan variabel2 yg dikirim
	$id_kelas			= strip_tags($_POST['id_kelas']);
	$nip				= strip_tags($_POST['nip']);
	$nama_kelas			= strip_tags($_POST['nama_kelas']);
	$nama_kelas1		= strip_tags($_POST['nama_kelas1']);
	
	
																	//untuk insert tabel kelas
	//untuk insert tabel kelas
	if($_GET['act']=="tambah"){
		
		validasi_ada("kelas","nama_kelas","$nama_kelas");
		//sql input database
		$id		= kode_otomatis("kelas","id_kelas");
		  $input = mysql_query("INSERT INTO kelas (
										id_kelas,
										nip,
										nama_kelas)
							 	VALUES (
										'$id',
										'$nip',
										'$nama_kelas'
										)");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=kelas'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		if($nama_kelas!==$nama_kelas1){
			validasi_ada("kelas","nama_kelas","$nama_kelas");
		}
		
		$update = mysql_query("UPDATE kelas SET 
										nip					='$nip',
										nama_kelas			='$nama_kelas'
									WHERE id_kelas			='$id_kelas'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=kelas'>";
		
	}
	
}												
//end untuk menu kelas


	   	                                                        //bagian mapel
//untuk menu mapel
elseif ($menu=='mapel' ){
	//penulisan variabel2 yg dikirim
	$id_mapel			= strip_tags($_POST['id_mapel']);
	$nip				= strip_tags($_POST['nip']);
	$nama_mapel			= strip_tags($_POST['nama_mapel']);
	$nama_mapel1		= strip_tags($_POST['nama_mapel1']);
	$kkm				= strip_tags($_POST['kkm']);
	$jenis_mapel		= strip_tags($_POST['jenis_mapel']);
	
	
																	//untuk insert tabel mapel
	//untuk insert tabel mapel
	if($_GET['act']=="tambah"){
		
		//sql input database
		$id		= kode_otomatis("mapel","id_mapel");
		  $input = mysql_query("INSERT INTO mapel (
										id_mapel,
										nip,
										nama_mapel,
										kkm,
										jenis_mapel)
							 	VALUES (
										'$id',
										'$nip',
										'$nama_mapel',
										'$kkm',
										'$jenis_mapel'
										)");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=mapel'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		if($nama_mapel!==$nama_mapel1){
			validasi_ada("mapel","nama_mapel","$nama_mapel");
		}
		
		$update = mysql_query("UPDATE mapel SET 
										nip					='$nip',
										nama_mapel			='$nama_mapel',
										kkm					='$kkm',
										jenis_mapel			='$jenis_mapel'
									WHERE id_mapel			='$id_mapel'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=mapel'>";
		
	}
	
}												
//end untuk menu mata pelajaran

																//bagian semester_tahun
//untuk menu semester_tahun
elseif ($menu=='semester_tahun' ){
	//penulisan variabel2 yg dikirim
	$id_semester_tahun	= strip_tags($_POST['id_semester_tahun']);
	$tahun_ajaran		= strip_tags($_POST['tahun_ajaran']);
	$semester			= strip_tags($_POST['semester']);
	$pilih				= strip_tags($_POST['pilih']);
	
	
																	//untuk insert tabel semester_tahun
	//untuk insert tabel semester_tahun
	if($_GET['act']=="tambah"){
		
		//sql input database
		$id		= kode_otomatis("semester_tahun","id_semester_tahun");
		if($pilih=="Y"){
			$ambil = mysql_query("SELECT id_semester_tahun,pilih FROM semester_tahun");
			while($tampil =mysql_fetch_array($ambil)){
				
				if($tampil['id_semester_tahun']!==$id){
					$update = mysql_query("UPDATE semester_tahun SET 
										pilih				='T'
									WHERE id_semester_tahun	='$tampil[id_semester_tahun]'");
				}
				
				
			}
		}
		
		  $input = mysql_query("INSERT INTO semester_tahun (
										id_semester_tahun,
										tahun_ajaran,
										semester,
										pilih)
							 	VALUES (
										'$id',
										'$tahun_ajaran',
										'$semester',
										'$pilih'
										)");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=semester_tahun'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		if($pilih=="Y"){
			$ambil = mysql_query("SELECT id_semester_tahun,pilih FROM semester_tahun");
			while($tampil =mysql_fetch_array($ambil)){
				
				if($tampil['id_semester_tahun']!==$id_semester_tahun){
					$update = mysql_query("UPDATE semester_tahun SET 
										pilih				='T'
									WHERE id_semester_tahun	='$tampil[id_semester_tahun]'");
				}
				
				
			}
		}
		
		
		$update = mysql_query("UPDATE semester_tahun SET 
										tahun_ajaran		='$tahun_ajaran',
										semester			='$semester',
										pilih				='$pilih'
									WHERE id_semester_tahun	='$id_semester_tahun'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=semester_tahun'>";
		
	}
	
}												
//end untuk menu tahun ajaran


																//bagian semester_tahun
//untuk menu semester_tahun
elseif ($menu=='masuk_kelas' ){
	//penulisan variabel2 yg dikirim
	$id_nilai			= strip_tags($_POST['id_nilai']);
	$id_kelas			= strip_tags($_POST['id_kelas']);
	
	
	
																	//untuk insert tabel masuk kelas
	//untuk insert tabel masuk kelas
	if($_GET['act']=="tambah"){
	
	foreach($_POST['nis'] as $urut=>$nis){
		//echo "$nis | $urut <br />";
	
		
		//sql input database
		$id		= kode_otomatis("nilai","id_nilai");
		  $input = mysql_query("INSERT INTO nilai (
										id_nilai,
										nis,
										id_semester_tahun,
										id_kelas)
							 	VALUES (
										'$id',
										'$nis',
										'$id_semester_tahun',
										'$id_kelas'
										)");
		
	}
	if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=masuk_kelas'>";
		
	}
																	//untuk edit tabel masuk kelas
	elseif($_GET['act']=="edit"){
				
		
		$update = mysql_query("UPDATE nilai SET 
										id_kelas				='$id_kelas'
									WHERE id_nilai				='$id_nilai'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=masuk_kelas'>";
		
	}
	
}												
//end untuk menu masuk_kelas


	   	                                                        //bagian nilai
//untuk menu nilai
elseif ($menu=='nilai' ){
	//penulisan variabel2 yg dikirim
	
	
		
		//untuk sikap
		foreach( $_POST['sikap'] as $id_nilai=>$sikap){
			//echo "$id_nilai $sikap |<br />";
			
			
			$update = mysql_query("UPDATE nilai SET 
										sikap			='$sikap'
									WHERE id_nilai		='$id_nilai'");
			
		}
		
		//untuk kerajinan
		//echo "<hr />";
		foreach( $_POST['kerajinan'] as $id_nilai1=>$kerajinan){
			//echo "$id_nilai1 $kerajinan |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										kerajinan		='$kerajinan'
									WHERE id_nilai		='$id_nilai1'");
			
		}
		
		
		//untuk kebersihan_ketrampilan
		//echo "<hr />";
		foreach( $_POST['kebersihan_ketrampilan'] as $id_nilai2=>$kebersihan_ketrampilan){
			//echo "$id_nilai2 $kebersihan_ketrampilan |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										kebersihan_ketrampilan	='$kebersihan_ketrampilan'
									WHERE id_nilai				='$id_nilai2'");
			
		}
		
		//untuk izin
		//echo "<hr />";
		foreach( $_POST['izin'] as $id_nilai3=>$izin){
			//echo "$id_nilai3 $izin |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										izin			='$izin'
									WHERE id_nilai		='$id_nilai3'");
			
		}
		
		//untuk sakit
		//echo "<hr />";
		foreach( $_POST['sakit'] as $id_nilai4=>$sakit){
			//echo "$id_nilai4 $sakit |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										sakit			='$sakit'
									WHERE id_nilai		='$id_nilai4'");
			
		}
		
		//untuk tanpa_keterangan
		//echo "<hr />";
		foreach( $_POST['tanpa_keterangan'] as $id_nilai5=>$tanpa_keterangan){
			//echo "$id_nilai5 $tanpa_keterangan |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										tanpa_keterangan='$tanpa_keterangan'
									WHERE id_nilai			='$id_nilai5'");
			
		}
		
		//untuk catatan_diri
		//echo "<hr />";
		foreach( $_POST['catatan_diri'] as $id_nilai6=>$catatan_diri){
			//echo "$id_nilai6 $catatan_diri |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										catatan_diri	='$catatan_diri'
									WHERE id_nilai		='$id_nilai6'");
			
		}
		
		
		//untuk catatan
		//echo "<hr />";
		foreach( $_POST['catatan'] as $id_nilai7=>$catatan){
			//echo "$id_nilai7 $catatan |<br />";
			
			$update = mysql_query("UPDATE nilai SET 
										catatan			='$catatan'
									WHERE id_nilai		='$id_nilai7'");
			
		}
	
																	//untuk insert tabel nilai
	//untuk insert tabel nilai
	if($_GET['act']=="tambah"){
	
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=nilai'>";
	}
																	//untuk edit tabel nilai
	elseif($_GET['act']=="edit"){
	
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=nilai'>";
	}
	
}												
//end untuk menu bank

	   	                                                        //bagian detail nilai
//untuk menu detail nilai
elseif ($menu=='detail_nilai' ){
	//penulisan variabel2 yg dikirim
	$id_mapel			= strip_tags($_POST['id_mapel']);
	
		//untuk nilai
			foreach( $_POST['nilai'] as $id_nilai=>$nilai_mapel){
				//echo "$id_nilai $id_mapel $nilai_mapel | ";
				
				$ambil = mysql_query("SELECT * FROM detail_nilai WHERE id_nilai='$id_nilai' AND id_mapel='$id_mapel'");
				$tampil= mysql_fetch_array($ambil);
				
				if(empty($tampil['id_nilai']) AND empty($tampil['id_mapel'])){
					//echo "Tambah";
					$input = mysql_query("INSERT INTO detail_nilai (
										id_nilai,
										id_mapel,
										nilai_mapel)
							 	VALUES (
										'$id_nilai',
										'$id_mapel',
										'$nilai_mapel'
										)");
					
										
				}
				else{
					//echo "Edit";
					$update = mysql_query("UPDATE detail_nilai SET 
										nilai_mapel		='$nilai_mapel'
									WHERE id_nilai		='$id_nilai' AND id_mapel		='$id_mapel' ");
				}
				
				//echo"<br />";
				$ambil		= mysql_query("SELECT * FROM detail_nilai WHERE id_nilai='$id_nilai'");
					$hitungrt = mysql_num_rows($ambil);
					$rata_rata		= 0;
					$jumlah_nilai	= 0;
					while($tampil = mysql_fetch_array($ambil)){
						@$jumlah_nilai	+= $tampil['nilai_mapel'];
						@$rata_rata		+= number_format($tampil['nilai_mapel']/$hitungrt,2);
					}
					
					//echo "$id_nilai | $rata_rata | $jumlah_nilai | $hitungrt<br />";
										
					$update1 	= mysql_query("UPDATE nilai SET 
										rata_rata		='$rata_rata',
										jumlah_nilai	='$jumlah_nilai'
									WHERE id_nilai		='$id_nilai' ");
				
			}	
			
			
			/*
			
			*/
		
		
		
	
																	//untuk insert tabel nilai
	//untuk insert tabel nilai
	if($_GET['act']=="tambah"){
	
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=detail_nilai'>";
	}
																	//untuk edit tabel nilai
	elseif($_GET['act']=="edit"){
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=detail_nilai'>";
	}
	
}												
//end untuk menu detail_nilai


	   	                                                        //bagian Profil Sekolahan
//untuk menu profil
elseif ($menu=='bank' ){
	//penulisan variabel2 yg dikirim
	$id_bank			= strip_tags($_POST['id_bank']);
	$nm_bank			= strip_tags($_POST['nm_bank']);
	$nm_bank1			= strip_tags($_POST['nm_bank1']);
	$nm_rek				= strip_tags($_POST['nm_rek']);
	$no_rek				= strip_tags($_POST['no_rek']);
	
	
																	//untuk insert tabel bank
	//untuk insert tabel bank
	if($_GET['act']=="tambah"){
		
		validasi_ada("bank","nm_bank","$nm_bank");
		//sql input database
		$id		= kode_otomatis("bank","id_bank");
		  $input = mysql_query("INSERT INTO bank (
										id_bank,
										nm_bank,
										nm_rek,
										no_rek)
							 	VALUES (
										'$id',
										'$nm_bank',
										'$nm_rek',
										'$no_rek'
										)");
		if (! $input){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
		}
		
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=bank'>";
	}
																	//untuk edit tabel member
	elseif($_GET['act']=="edit"){
		if($nm_bank!==$nm_bank1){
			validasi_ada("bank","nm_bank","$nm_bank");
		}
		
		$update = mysql_query("UPDATE bank SET 
										nm_bank				='$nm_bank',
										nm_rek				='$nm_rek',
										no_rek				='$no_rek'
									WHERE id_bank			='$id_bank'");
		
    
		
		if (! $update){
			echo mysql_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ')</script>";
		}
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=bank'>";
		
	}
	
}												
//end untuk menu bank

