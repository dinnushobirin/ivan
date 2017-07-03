<?php
	//isset
if (empty($_SESSION['nis'])){
  echo "<center>Untuk mengakses modul, Anda harus login <br />";
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
exit;
}
else{
	if ($_GET['menu']==""){
	 echo "  <meta http-equiv='refresh' content='0;url=index.php?menu=login'>";
	}

	$ambil		= mysql_query("SELECT * FROM siswa s JOIN nilai n JOIN kelas k JOIN semester_tahun e ON s.nis=n.nis AND n.id_kelas=k.id_kelas AND n.id_semester_tahun=e.id_semester_tahun WHERE n.id_nilai='$_GET[id]'");
	$tampil	= mysql_fetch_array($ambil);
?>
         


                <div class="row clearfix">
					
					
                    <div class="grid_12">                   <div class="inner ">
						
							<table width="100%" >
								<tr>
									<td width="50%">
										<table border="1px">
											<tr style="text-align: left;">
												<td width="30%">Nama Siswa</td>
												<td width="2%">:</td>
												<td width="68%"><?php echo "$tampil[nama_lengkap]"; ?></td>
											</tr>
											<tr>
												<td>Nomor Induk</td>
												<td>:</td>
												<td><?php echo "$tampil[nis]"; ?></td>
											</tr>
											<tr>
												<td>Nama Sekolah</td>
												<td>:</td>
												<td><?php echo "$nama_sekolah"; ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><?php echo "$alamat_sekolah"; ?></td>
											</tr>
										</table>
									</td>
									<td width="50%">
										<table>
											<tr>
												<td width="30%">Kelas</td>
												<td width="2%">:</td>
												<td width="68%"><?php echo "$tampil[nama_kelas]"; ?></td>
											</tr>
											<tr>
												<td>Semester</td>
												<td>:</td>
												<td><?php echo "$tampil[semester]"; ?></td>
											</tr>
											<tr>
												<td>Tahun Pelajaran</td>
												<td>:</td>
												<td><?php echo "$tampil[tahun_ajaran]"; ?></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="2">
									<br />
									<table width="100%" height="100%" border="1px" >
										<tr >
											<th width="3%" class="ayush">No</th>
											<th width="40%" class="ayush">Mata Pelajaran</th>
											<th width="15%" class="ayush">KKM/SKBM *)</th>
											<th width="15%" class="ayush">Nilai</th>
											<th width="15%" class="ayush">Nilai <br />Rata-rata Kelas</th>
										</tr>
<?php
	$ambild	= mysql_query("SELECT * FROM detail_nilai d JOIN mapel m ON d.id_mapel=m.id_mapel WHERE d.id_nilai='$_GET[id]' AND jenis_mapel='wajib' ");
	$no = 1;
	while($tampild =mysql_fetch_array($ambild)){
	
	$rata_kelas 	= 0;	
		
	$ambilk		= mysql_query("SELECT * FROM nilai WHERE id_kelas='$tampil[id_kelas]' AND id_semester_tahun='$tampil[id_semester_tahun]'");	
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
											<th class="ayush"><?php echo $no; ?></th>
											<th class="ayush"><?php echo $tampild['nama_mapel']; ?></th>
											<th class="ayush"><?php echo $tampild['kkm']; ?></th>
											<th class="ayush"><?php echo $tampild['nilai_mapel']; ?></th>
											<th class="ayush"><?php echo $rata_kelas; ?></th>
										</tr>


<?php
		$no++;		
		
	}
?>
										<tr>
											<td class="ayush" colspan="5" align="center">Muatan Lokal</td>
										</tr>
<?php
	$ambild1	= mysql_query("SELECT * FROM detail_nilai d JOIN mapel m ON d.id_mapel=m.id_mapel WHERE d.id_nilai='$_GET[id]' AND jenis_mapel='lokal' ");
	$no1 = 1;
	while($tampild1 =mysql_fetch_array($ambild1)){
	
	$rata_kelas1 	= 0;	
		
	$ambilk1		= mysql_query("SELECT * FROM nilai WHERE id_kelas='$tampil[id_kelas]' AND id_semester_tahun='$tampil[id_semester_tahun]'");	
	while($tampilk1	= mysql_fetch_array($ambilk1)){
		
		$ambilda1	= mysql_query("SELECT * FROM detail_nilai WHERE id_nilai='$tampilk1[id_nilai]' AND id_mapel='$tampild1[id_mapel]' ");	
		@$hitungda1	= mysql_num_rows($ambilk1);
		$tampilda1	= mysql_fetch_array($ambilda1);
		//$rata_kelas = 0;
		@$rata_kelas1	+= number_format($tampilda1['nilai_mapel']/$hitungda1,2);
		@$rata_kelas01	+= number_format($tampilda1['nilai_mapel']/$hitungda1,2);
					//echo "$tampilk[id_nilai] | $tampild[id_mapel]|$tampilda[nilai_mapel]| $hitungda |$rata_kelas<br />";
	}
		
?>										
										
	
										<tr>
											<th class="ayush"><?php echo $no1; ?></th>
											<th class="ayush"><?php echo $tampild1['nama_mapel']; ?></th>
											<th class="ayush"><?php echo $tampild1['kkm']; ?></th>
											<th class="ayush"><?php echo $tampild1['nilai_mapel']; ?></th>
											<th class="ayush"><?php echo $rata_kelas1; ?></th>
										</tr>


<?php
		$no1++;		
		
	}
?>									</table>
									<br />
									</td>
								</tr>
							</table>
							<br />
							<table width="100%" >
								<tr>
									<th width="1%" class="ayush">No</th>
									<th class="ayush">Kepribadian</th>
									<th class="ayush">Nilai</th>
									<th class="ayush">Ketidak Hadiran</th>
									<th class="ayush">Nilai</th>
								</tr>
								<tr>
									<th width="1%" class="ayush">1</th>
									<th class="ayush">Sikap</th>
									<th class="ayush"><?php echo $tampil['sikap']; ?></th>
									<th class="ayush">Izin</th>
									<th class="ayush"><?php echo $tampil['izin']; ?></th>
								</tr>
								<tr>
									<th width="1%" class="ayush">2</th>
									<th class="ayush">Kerajinan</th>
									<th class="ayush"><?php echo $tampil['kerajinan']; ?></th>
									<th class="ayush">Izin</th>
									<th class="ayush"><?php echo $tampil['izin']; ?></th>
								</tr>
								<tr>
									<th width="1%" class="ayush">3</th>
									<th class="ayush">Kebersihan Dan Kerapian</th>
									<th class="ayush"><?php echo $tampil['kebersihan_ketrampilan']; ?></th>
									<th class="ayush">Tanpa Keterangan</th>
									<th class="ayush"><?php echo $tampil['tanpa_keterangan']; ?></th>
								</tr>
							</table>
							<br />
							<p>
								Catatan:<br />
								*)  KKM (Kriteria Kentuntasan Minimal)<br />
								**) SKBM (Standar Kentuntasan Belajar Minimal)<br />
								mohon raport yang asli diambil pada tanggal yang sudah ditentukan!!!
							</p>
						</div> 
												
                        
                    </div> 
				
                </div> 
<?php
	}
?>				
			