<br />                       
<?php
	
	
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s JOIN kelas k ON n.nis=s.nis AND n.id_kelas=k.id_kelas WHERE n.id_nilai='$_GET[id]' ");
	$tampil = mysql_fetch_array($ambil);

		
	
?>


<h2 align="center">LAPORAN</h2>
<h1 align="center">PENILAIAN HASIL BELAJAR <br /> SEKOLAH DASAR <br /> (SD)</h1>
<br /><br />
<center>
<table border="0" width="70%">
	<tr>
		<td width="30%">Nama Sekolah</td>
		<td width="5">:</td>
		<td><b> <?php echo $nama_sekolah; ?> </b></td>
	</tr>
	<tr>
		<td>NSS</td>
		<td>:</td>
		<td><?php echo $nss; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $alamat_sekolah; ?></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td>:</td>
		<td>Krakitan</td>
	</tr>
	<tr>
		<td>Kabupaten/Kota</td>
		<td>:</td>
		<td>Klaten</td>
	</tr>
	<tr>
		<td>Propinsi</td>
		<td>:</td>
		<td>Jawa Tengah</td>
	</tr>
</table>
<br />
<br />
<h3>NAMA SISWA</h3>
<H1><?php echo $tampil['nama_lengkap']; ?></H1>
<h3>NOMOR INDUK : <?php echo $tampil['nis']; ?></h3>
<h3>DEPARTEMEN PENDIDIKAN NASIONAL<br />REPUBLIK INDONESIA</h3>
</center>