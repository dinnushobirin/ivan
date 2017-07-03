<br />                       
<?php
	
	
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s JOIN kelas k ON n.nis=s.nis AND n.id_kelas=k.id_kelas WHERE n.id_nilai='$_GET[id]' ");
	$tampil = mysql_fetch_array($ambil);

	$ambil_rapot	= mysql_query("SELECT id_nilai,jumlah_nilai,nis FROM nilai WHERE id_kelas='$tampil[id_kelas]' AND id_semester_tahun='$id_semester_tahun' ORDER BY jumlah_nilai DESC");
	$no = 1;
	$total_siswa = mysql_num_rows($ambil_rapot);
	while($tampil_rapot	= mysql_fetch_array($ambil_rapot)){
		if($tampil_rapot['id_nilai']==$_GET['id']){
			echo "$no |$tampil_rapot[nis] <br />";
			$rangking = $no;
		}
		
	$no++;
	}
	
	
	
?>						
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
								<tr>
									<td colspan="2">
									<br />
									<center>
									<table width="95%" height="100%" border="1px" >
										<tr >
											<th width="3%" >No</th>
											<th width="40%" >Mata Pelajaran</th>
											<th width="15%" >KKM/SKBM *)</th>
											<th width="15%" >Nilai</th>
											<th width="15%" >Nilai <br />Rata-rata Kelas</th>
										</tr>	
<?php
	$ambild	= mysql_query("SELECT * FROM detail_nilai d JOIN mapel m ON d.id_mapel=m.id_mapel WHERE d.id_nilai='$_GET[id]' AND jenis_mapel='wajib' ");
	$no = 1;
	while($tampild =mysql_fetch_array($ambild)){
		
	$rata_kelas 	= 0;	
		
	$ambilk		= mysql_query("SELECT * FROM nilai WHERE id_kelas='$tampil[id_kelas]' AND id_semester_tahun='$id_semester_tahun'");	
	while($tampilk	= mysql_fetch_array($ambilk)){
		
		$ambilda	= mysql_query("SELECT * FROM detail_nilai WHERE id_nilai='$tampilk[id_nilai]' AND id_mapel='$tampild[id_mapel]' ");	
		@$hitungda	= mysql_num_rows($ambilk);
		$tampilda	= mysql_fetch_array($ambilda);
		//$rata_kelas = 0;
		@$rata_kelas	+= number_format($tampilda['nilai_mapel']/$hitungda,2);
		@$rata_kelas0	+= number_format($tampilda['nilai_mapel']/$hitungda,2);
					//echo "$tampilk[id_nilai] | $tampild[id_mapel]|$tampilda[nilai_mapel]| $hitungda |$rata_kelas<br />";
	}
?>										
										<tr>
											<td >1</td>
											<td ><?php echo $tampild['nama_mapel']; ?></td>
											<td ><?php echo $tampild['kkm']; ?></td>
											<td ><?php echo $tampild['nilai_mapel']; ?></td>
											<td ><?php echo $rata_kelas; ?></td>
										</tr>
<?php
		$no++;		
		
	}
?>
										<tr>
											<th  colspan="5" align="center">Muatan Lokal</th>
										</tr>
<?php
	$ambildl	= mysql_query("SELECT * FROM detail_nilai d JOIN mapel m ON d.id_mapel=m.id_mapel WHERE d.id_nilai='$_GET[id]' AND jenis_mapel='lokal' ");
	$no = 1;
	while($tampildl =mysql_fetch_array($ambildl)){
		
		$rata_kelas1 	= 0;
		
	$ambilk1		= mysql_query("SELECT * FROM nilai WHERE id_kelas='$tampil[id_kelas]' AND id_semester_tahun='$id_semester_tahun'");	
	while($tampilk1	= mysql_fetch_array($ambilk1)){
		
		$ambilda1	= mysql_query("SELECT * FROM detail_nilai WHERE id_nilai='$tampilk1[id_nilai]' AND id_mapel='$tampildl[id_mapel]' ");	
		@$hitungda1	= mysql_num_rows($ambilk1);
		$tampilda1	= mysql_fetch_array($ambilda1);
		//$rata_kelas = 0;
		@$rata_kelas1	+= number_format($tampilda1['nilai_mapel']/$hitungda1,2);
		@$rata_kelas01	+= number_format($tampilda1['nilai_mapel']/$hitungda1,2);
					//echo "$tampilk[id_nilai] | $tampild[id_mapel]|$tampilda[nilai_mapel]| $hitungda |$rata_kelas<br />";
	}
		
?>										
										<tr>
											<td >1</td>
											<td ><?php echo $tampildl['nama_mapel']; ?></td>
											<td ><?php echo $tampildl['kkm']; ?></td>
											<td ><?php echo $tampildl['nilai_mapel']; ?></td>
											<td ><?php echo $rata_kelas1; ?></td>
										</tr>
<?php
		$no++;		
		
	}
?>


<?php
	
	$ambilrt	= mysql_query("SELECT * FROM detail_nilai d JOIN mapel m ON d.id_mapel=m.id_mapel WHERE d.id_nilai='$_GET[id]'  ");
	$no = 1;
	$hitungrt = mysql_num_rows($ambilrt);
	while($tampilrt=mysql_fetch_array($ambilrt)){
		
		@$total_kkm		+= number_format($tampilrt['kkm']);
		@$rata_kkm		+= number_format($tampilrt['kkm']/$hitungrt,2);
		
		
		@$total_nilai	+= number_format($tampilrt['nilai_mapel']);
		@$rata_nilai	+= number_format($tampilrt['nilai_mapel']/$hitungrt,2);
	}
	
		$ambilhi 	= mysql_query("SELECT * FROM nilai n JOIN detail_nilai d ON n.id_nilai=d.id_nilai WHERE id_kelas=$tampil[id_kelas] AND id_semester_tahun=$id_semester_tahun AND n.nis=$tampil[nis]");
		
		$hitung_jumlah_kelas	= mysql_num_rows($ambilhi);
		
		//echo "$hitung_jumlah_kelas";
		
		@$total_jumlah_kelas 	= number_format($rata_kelas0+$rata_kelas01,2);
		@$total_rata_kelas 		= number_format($total_jumlah_kelas/$hitung_jumlah_kelas,2);
		
		//secho "$rata_kelas0 | $rata_kelas01 |a $hitungda |$hitungda1";
		
?>										
										
										
										<tr>
											<th  colspan="2" align="center">Rata-rata</th>
											<th><?php echo $rata_kkm; ?></th>
											<th><?php echo $rata_nilai; ?></th>
											<th><?php echo $total_rata_kelas; ?></th>
										</tr>
										<tr>
											<th  colspan="2" align="center">Total</th>
											<th><?php echo $total_kkm; ?></th>
											<th><?php echo $total_nilai; ?></th>
											<th><?php echo $total_jumlah_kelas; ?></th>
										</tr>
										<tr>
											<th  colspan="2" align="center">Ranking</th>
											<td colspan="3" align="center">Rangking <b><?php echo $rangking; ?></b> Dari <b><?php echo $total_siswa; ?></b> Siswa</td>
										</tr>
									</table>
									</center>
									<br />
									</td>
								</tr>
							</table>
							<br />
							<center>
							<table width="75%" border="1">
								<tr>
									<th width="1%" >No</th>
									<th >Kepribadian</th>
									<th align="center">Nilai</th>
									<th >Ketidak Hadiran</th>
									<th align="center">Nilai</th>
								</tr>
								<tr>
									<td width="1%" >1</td>
									<td >Sikap</td>
									<td align="center"><?php echo $tampil['sikap']; ?></td>
									<td >Sakit</td>
									<td align="center"><?php echo $tampil['sakit']; ?></td>
								</tr>
								<tr>
									<td width="1%" >2</td>
									<td >Kerajinan</td>
									<td align="center"><?php echo $tampil['kerajinan']; ?></td>
									<td >Izin</td>
									<td align="center"><?php echo $tampil['izin']; ?></td>
								</tr>
								<tr>
									<td width="1%" >3</td>
									<td >Kebersihan Dan Kerapian</td>
									<td align="center"><?php echo $tampil['kebersihan_ketrampilan']; ?></td>
									<td >Tanpa Keterangan</td>
									<td align="center"><?php echo $tampil['tanpa_keterangan']; ?></td>
								</tr>
							</table>
							</center>
							<br />
							<p>
								Catatan:<br />
								*)  KKM (Kriteria Kentuntasan Minimal)<br />
								**) SKBM (Standar Kentuntasan Belajar Minimal)<br />
							</p>						
						
												
                      
			