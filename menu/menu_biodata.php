<?php
	session_start();
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

	$ambil		= mysql_query("SELECT * FROM siswa WHERE nis='$_SESSION[nis]'");
	$tampil	= mysql_fetch_array($ambil);
?>
         	<div class="breadcrumb-place ">
                <div class="row clearfix">
                    <h1 class="page-title">Rapot Siswa : <u><b><?php echo "$tampil[nama_lengkap]"; ?></b></u></h1>
                </div><!-- row -->
            </div><!-- breadcrumb -->
		<br />


                <div class="row clearfix">
					
                    <div class="grid_3">
						<div class="inner" style="padding:5px;">
							<img src="images/images_siswa/<?php echo "$tampil[foto]";  ?>" class="tt_box_rounded tt_box_border_grey attachment-full" alt="Image Alt" /> 
						</div>
						<br />
							<ul >
								<li class="menu-item "><a href="?menu=biodata">Biodata</a></li>
								<li class="menu-item"><a href="./logout.php">Log Out</a></li>
							</ul>
						
						<div class="gap clearfix custom-h60" ></div>
						
                        <h3 class="col-title">Silah Kan Pilih</h3>
						<span class="liner"></span>
						
                        <ul class="tt-toggle">
<?php
	$ambilk	= mysql_query("SELECT * FROM kelas k JOIN nilai n ON k.id_kelas=n.id_kelas WHERE n.nis='$_SESSION[nis]' GROUP BY n.id_kelas");
	
	while($tampilk=mysql_fetch_array($ambilk)){
?>

							
							<li class="sub-toggle">
								<div class="toggle-head">
									<div class="toggle-head-sign">&minus;</div>
									<p class="tbutton  tbutton1 color4" style="padding:5px;">Kelas <?php echo $tampilk['nama_kelas']; ?> </p>
								</div>
								<div class="toggle-content">
									<ul class="menu " >
<?php
	$ambils	= mysql_query("SELECT * FROM  semester_tahun s JOIN nilai n ON s.id_semester_tahun=n.id_semester_tahun WHERE n.nis='$_SESSION[nis]' AND n.id_kelas='$tampilk[id_kelas]'");
	
	while($tampils=mysql_fetch_array($ambils)){
?>
										<li class="menu-item " style="padding:2px;"><a href="?menu=nilai&id=<?php echo $tampils['id_nilai']; ?>">Semester <?php echo $tampils['semester']; ?></a></li>
<?php		
	}
?>
									</ul>
								</div>
							</li>
<?php		
	}
?>

						</ul>
						

					
					</div> 
					
                    <div class="grid_8">
						
                        <h3 class="col-title"> Nama Lengkap</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nama_lengkap]"; ?>
                           	</p>
						</div> 
						
						<h3 class="col-title"> Jenis Kelamin</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[jenis_kelamin]"; ?>
                           	</p>
						</div>
						
						<h3 class="col-title"> Tempat Lahir</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
                           	</p>
							<p><?php echo "$tampil[tempat_lahir]"; ?>
						</div>
						
						
						<h3 class="col-title"> Tanggal Lahir</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo tgl_indo("$tampil[tanggal_lahir]"); ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Agama</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[agama]"; ?>
                           	</p>
						</div>						
                        
						<h3 class="col-title"> Anak Ke</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[anak_ke]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Status Anak</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[status_anak]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Alamat Siswa</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[alamat_siswa]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Telepon Ortu</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[telepon_ortu]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Terima Di Kelas</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[terima_di_kelas]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Terima Pada Tanggal</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo tgl_indo("$tampil[terima_pada_tanggal]"); ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Nama Sekolah Asal</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nama_sekolah_asal]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Alamat Sekolah Asal</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[alamat_sekolah_asal]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Nama Ayah</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nama_ayah]"; ?>
                           	</p>
						</div>
						
						<h3 class="col-title"> Nama Ibu</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nama_ibu]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Pekerjaan Ayah</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[pekerjaan_ayah]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Pekerjaan Ibu</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[pekerjaan_ibu]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Nama Wali</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nama_wali]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Alamat Wali</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[alamat_wali]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Telepon Wali</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[telepon_wali]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Pekerjaan Wali</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[pekerjaan_wali]"; ?>
                           	</p>
						</div>
						
						
						
						
						
						
						
                    </div> 
				
                </div> 
<?php
	}
?>				
			