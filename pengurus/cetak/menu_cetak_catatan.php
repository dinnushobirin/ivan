<br />                       
<?php
	
	
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s JOIN kelas k JOIN guru g ON n.nis=s.nis AND n.id_kelas=k.id_kelas AND k.nip=g.nip WHERE n.id_nilai='$_GET[id]' ");
	$tampil = mysql_fetch_array($ambil);

	
?>

<center>
<table width="100%" border="0">
								<tr>
									<td width="50%">
										<table border="0px" width="100%">
											<tr style="text-align: left;">
												<td width="23%">Nama Siswa</td>
												<td width="1%">:</td>
												<td ><?php echo $tampil['nama_lengkap']; ?></td>
											</tr>
											<tr>
												<td>Nomor Induk</td>
												<td>:</td>
												<td><?php echo $tampil['nis']; ?></td>
											</tr>
											<tr>
												<td>Nama Sekolah</td>
												<td>:</td>
												<td><?php echo $nama_sekolah; ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><?php echo $alamat_sekolah; ?></td>
											</tr>
										</table>
									</td>
									<td width="50%" valign="top">
										<table border="0px" width="100%">
											<tr>
												<td width="23%">Kelas</td>
												<td width="1%">:</td>
												<td ><?php echo $tampil['nama_kelas']; ?></td>
											</tr>
											<tr>
												<td>Semester</td>
												<td>:</td>
												<td><?php echo $semester; ?></td>
											</tr>
											<tr>
												<td>Tahun Pelajaran</td>
												<td>:</td>
												<td><?php echo $tahun_ajaran; ?></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
<table border="0" width="95%">
	<tr>
		<td colspan="3">Catatan Tentang Pengembangan Diri Siswa : </td>
	</tr>
	<tr>
		<td colspan="3" height="400px">
			<table border="1" width="100%" height="100%">
				<tr>
					<td align="center"><?php echo $tampil['catatan_diri']; ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr />Catatan Siswa : </td>
	</tr>
	<tr>
		<td colspan="3" height="400px">
			<table border="1" width="100%" height="100%">
				<tr>
					<td align="center"><?php echo $tampil['catatan']; ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="1"> <br />
		<br /></td>
	</tr>
	<tr>
		<hr />
		<td valign="bottom" align="center">Orang Tua/Wali</td>
		<td valign="bottom" align="center">Wali Kelas</td>
<?php
	if($semester=="2"){
?>		
		<td>MENYATAKAN : 
		<br />Tinggal Di Kelas ____ <br />	
		Naik Kelas ___
		<br />
		<br>Kepala Sekolah <?php echo $nama_sekolah; ?></td>
<?php
	}
?>
	</tr>
	<tr height="100">
		<td></td>
	</tr>
	<tr>
		<td align="center">(__________________)</td>
		<td align="center">(___<u><?php echo "$tampil[nama_guru]"; ?></u>____)
		<br>
			Nip : <?php echo "$tampil[nip]"; ?>
		</td>
<?php
	if($semester=="2"){
?>		
		<td>(__<u><?php echo "$nama_kepsek"; ?></u>___)
		<br>
			Nip : <?php echo "$nip_kepsek"; ?>
		</td>
<?php
	}
?>		

	</tr>
</table>
</center>