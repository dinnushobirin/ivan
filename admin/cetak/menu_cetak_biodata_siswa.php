<br />                       
<?php
	
	
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s JOIN kelas k ON n.nis=s.nis AND n.id_kelas=k.id_kelas WHERE n.id_nilai='$_GET[id]' ");
	$tampil = mysql_fetch_array($ambil);

		
	
?>
<center>
<table border="0" width="95%">
	<tr>
		<td colspan="4" align="center"><b>KETERANGAN TENTANG DIRI SISWA</b><br /><br /></td>
	</tr>
	<tr>
		<td width="5">1.</td>
		<td >Nama Siswa (Lengkap)</td>
		<td width="5">:</td>
		<td width="60%"><?php echo $tampil['nama_lengkap']; ?></td>
	</tr>
	<tr>
		<td>2.</td>
		<td>Nomor Induk</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['nis']; ?></td>
	</tr>
	<tr>
		<td>3.</td>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['jenis_kelamin']; ?></td>
	</tr>
	<tr>
		<td>4.</td>
		<td>Tempat Tanggal Lahir</td>
		<td>:</td>
		<td width="60%"><?php echo tgl_indo($tampil['nis']); ?></td>
	</tr>
	
	<tr>
		<td>5.</td>
		<td>Agama</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['agama']; ?></td>
	</tr>
	
	<tr>
		<td>6.</td>
		<td>Anak Ke</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['anak_ke']; ?></td>
	</tr>
	
	<tr>
		<td>7.</td>
		<td>Status Anak</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['status_anak']; ?></td>
	</tr>
	<tr>
		<td valign="top">8.</td>
		<td>Alamat Siswa<br />
		<br /><br />
		Telepon
		</td>
		<td>:<br />
		<br /><br />
		:</td>
		<td width="60%" valign="top"><?php echo $tampil['alamat_siswa']; ?><br />
		<br /><br />
		<?php echo $tampil['telepon_ortu']; ?></td>
	</tr>
	<tr>
		<td valign="top">9.</td>
		<td>Diterima Di Sekolah ini<br />
		a. Di Kelas<br />
		b. Pada Tanggal<br />
		</td>
		<td><br />:<br />:</td>
		<td width="60%" valign="top">
		<br />
		<?php echo $tampil['terima_di_kelas']; ?><br />
		<?php echo $tampil['terima_pada_tanggal']; ?>

		</td>
	</tr>
	<tr>
		<td valign="top">10.</td>
		<td>Sekolah Asal<br />
		a. Nama Sekolah<br />
		b. Alamat<br /></td>
		<td>:</td>
		<td width="60%" valign="top">
		<br />
		<?php echo $tampil['nama_sekolah_asal']; ?><br />
		<?php echo $tampil['alamat_sekolah_asal']; ?>
		</td>
	</tr> 
	<tr>
		<td valign="top">11.</td>
		<td>Nama Orang Tua<br />
		a. Ayah<br />
		b. Ibu<br /></td>
		<td>:</td>
		<td width="60%" valign="top">
		<br />
		<?php echo $tampil['nama_ayah']; ?><br />
		<?php echo $tampil['nama_ibu']; ?>
		</td>
	</tr>
	<tr>
		<td valign="top">12.</td>
		<td>Alamat Orang Tua<br />
		a. Ayah<br />
		b. Ibu<br /></td>
		<td>:</td>
		<td width="60%" valign="top">
		<br />
		<?php echo $tampil['alamat_ayah']; ?><br />
		<?php echo $tampil['alamat_ibu']; ?>
		</td>
	</tr>
	<tr>
		<td valign="top">13.</td>
		<td>Pekerjaan Orang Tua<br />
		a. Ayah<br />
		b. Ibu<br /></td>
		<td>:</td>
		<td width="60%" valign="top">
		<br />
		<?php echo $tampil['pekerjaan_ayah']; ?><br />
		<?php echo $tampil['pekerjaan_ibu']; ?>
		</td>
	</tr>
	<tr>
		<td>14.</td>
		<td>Nama Wali</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['nama_wali']; ?></td>
	</tr>
	<tr>
		<td>15.</td>
		<td>Alamat Wali</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['alamat_wali']; ?></td>
	</tr>
	<tr>
		<td>16.</td>
		<td>Telepon</td>
		<td>:</td>
		<td width="60%"><?php echo $tampil['telepon_wali']; ?></td>
	</tr>
	
	<tr>
		<td></td>
		<td><img src="../images/images_siswa/<?php echo $tampil['foto']; ?>"></td>
		<td></td>
		<td width="60%" align="center">Kepala Sekolah Dasar Krakitan 03
		<br /><br /><br />
		__<u><?php echo $nama_kepsek;  ?></u>__<br />
		NIP. <?php echo $nip_kepsek;  ?>
		</td>
	</tr>
</table>
</center>