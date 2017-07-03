<?php
$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");


$hari_ini = $seminggu[$hari];
$tgl_sekarang = date("Y-m-d");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

//$ambils		= mysql_query("SELECT * FROM semester_tahun WHERE pilih='Y' LIMIT 1");
//$tampils	= mysql_fetch_array($ambils);
		
//		$id_semester_tahun	= $tampils['id_semester_tahun'];
//		$tahun_ajaran		= $tampils['tahun_ajaran'];
//		$semester			= $tampils['semester'];
		

		
$ambilp	= mysql_query("SELECT * FROM profil LIMIT 1");
$tampilp = mysql_fetch_array($ambilp);	
		
		$id_profil			= $tampilp['id_profil']; 
		$nama_sekolah		= $tampilp['nama_sekolah'];
		$alamat_sekolah		= $tampilp['alamat_sekolah'];
		$visi_sekolah		= $tampilp['visi_sekolah'];
		$misi_sekolah		= $tampilp['misi_sekolah'];
		$catatan_sekolah	= $tampilp['catatan_sekolah'];
		$foto_sekolah		= $tampilp['foto_sekolah'];
		$fax_sekolah		= $tampilp['fax_sekolah'];
		$email				= $tampilp['email'];
		$no_telepon			= $tampilp['no_telepon'];
		$website			= $tampilp['website'];
		$nama_kepsek		= $tampilp['nama_kepsek'];
		$nip_kepsek			= $tampilp['nip_kepsek'];
		$nss				= $tampilp['nss'];
		
?>
