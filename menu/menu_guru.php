         	<div class="breadcrumb-place ">
                <div class="row clearfix">
                    <h1 class="page-title">Daftar Guru SD N 3 Krakitan</h1>
                </div><!-- row -->
            </div><!-- breadcrumb -->
		<br />


                <div class="row clearfix">
					
                    <div class="grid_4">
								<img src="images/images_profil/<?php echo "$foto_sekolah"; ?>" class="tt_box_rounded tt_box_border_grey attachment-full" alt="Image Alt" />  

						<hr />
						<div class="footer_widget widget_official_contact grid_12">
							<h3 class="col-title">Kontak</h3>
							<span class="liner"></span>
						
							<div class="address">            	
								<p> <?php echo "$alamat_sekolah"; ?> </p>
			            		<div> <i class="icon-phone icon-xs"  ></i><?php echo "$no_telepon"; ?> </div>
			            		<div> <i class="icon-print icon-xs"  ></i><?php echo "$fax_sekolah"; ?></div>
			            		<div><a href="mailto:<?php echo "$email"; ?>" target="_blank"><i class="icon-envelope-alt icon-xs"  ></i><?php echo "$email"; ?></a> </div>
							</div>
						</div>
					
					</div> 
					
                    <div class="grid_8">
						
                        <h3 class="col-title"> Daftar Guru</h3>
						<span class="liner"></span>
						
                        <div class="tt_text_column tt_content_element ">
							<ol>
<?php
	$ambil	= mysql_query("SELECT * FROM guru ");
	while($tampil = mysql_fetch_array($ambil)){
?>

								<li><a href="?menu=detail_guru&id=<?php echo $tampil['nip']; ?>"><?php echo $tampil['nama_guru']; ?></a></li>

<?php		
	}	
?>								
							</ol>
						</div> 
						
						
                        
                    </div> 
				
                </div> 
				
			