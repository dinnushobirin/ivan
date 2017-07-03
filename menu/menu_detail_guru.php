         	<div class="breadcrumb-place ">
                <div class="row clearfix">
                    <h1 class="page-title">Detail Guru SD N 3 Krakitan</h1>
                </div><!-- row -->
            </div><!-- breadcrumb -->
		<br />

<?php
	$ambil	= mysql_query("SELECT * FROM guru WHERE nip='$_GET[id]'");
	$tampil	= mysql_fetch_array($ambil);
?>
                <div class="row clearfix">
					
					
                    <div class="grid_4">
								<img src="images/images_guru/<?php echo "$tampil[foto]";  ?>" class="tt_box_rounded tt_box_border_grey attachment-full" alt="Image Alt" />					
					</div> 
					
                    <div class="grid_8">
						
                        <h3 class="col-title"> Nama Guru</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nama_guru]"; ?>
                           	</p>
						</div> 
						
						<h3 class="col-title"> Nip</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[nip]"; ?>
                           	</p>
						</div>
						
						<h3 class="col-title"> Alamat</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[alamat]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Jenis Kelamin</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[jenis_kelamin]"; ?>
                           	</p>
						</div>
                        
						<h3 class="col-title"> Agama</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[agama]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Tempat Lahir</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[tempat_lahir]"; ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> Tanggal Lahir</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo tgl_indo("$tampil[tanggal_lahir]"); ?>
                           	</p>
						</div>
						
						
						<h3 class="col-title"> No Telepon</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<p><?php echo "$tampil[no_telp]"; ?>
                           	</p>
						</div>
						
                    </div> 
				
                </div> 
				
			