<?php
session_start();
include "../config/koneksi.php";
include "../config/library.php";
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

  if (!$hapus){
     echo "<script>alert('HAPUS GAGAL')</script>";
    }
  else{
     echo "<script>alert('Data Berhasil Di Hapus')</script>";
    }
     echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=$menu'>";
}
    	                                                        //end bagian hapus
																

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
	
	
	
																	//untuk insert tabel guru
	//untuk insert tabel guru
	if($_GET['act']=="tambah"){
		
				
		echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=biodata'>";
	}
																	//untuk edit tabel guru
	elseif($_GET['act']=="edit"){
				
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


